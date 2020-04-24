<?php
class Picture extends Database
{
    //pasword for virk_1= v1rkPls!

    public function getAllUserPictures($user_id)
    {
        $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);

        $sql = "SELECT image_id, title, description, image FROM picture WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $result = $stmt->fetchAll();

        for ($i = 0; $i < count($result); $i++) {
            $result[$i]['image_id'] = (int) $result[$i]['image_id'];
            unset($result[$i][0]);
            unset($result[$i][1]);
            unset($result[$i][2]);
            unset($result[$i][3]);
        }

        return $result;
    }

    public function addPicture($user_id)
    {
        $user_id = filter_var($user_id, FILTER_SANITIZE_STRING);
        $jsonBody = json_decode($_POST['json']);
        $username = filter_var(trim($jsonBody->username), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($jsonBody->password), FILTER_SANITIZE_STRING);

        $sql = "SELECT user_id, username, password FROM user WHERE user_id = :user_id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $result = $stmt->fetch();

        //Måske lav test på image, om den overholder image kriterier.
        //kan gøres med at dele stringen op, for at se om den over formen, som sendes
        //eks: $photo = 'data:image/' . $imageFileType . ';base64,' . $image_base64; => dette er hvad der indsættes i databasen
        // $extensions_arr = array("jpg", "jpeg", "png", "gif"); på imagefiletype

        if ($username === $result['username'] && password_verify($password, $result['password'])) {
            $title = $jsonBody->title;
            $description = $jsonBody->description;
            $image = $jsonBody->image;
            if (empty($title) || empty($description) || empty($image)) {
            } elseif ((strlen($title) > 25) or (strlen($description) > 250)) {
            } else {
                $title = filter_var($title, FILTER_SANITIZE_STRING);
                $description = filter_var($description, FILTER_SANITIZE_STRING);
                $image = filter_var($image, FILTER_SANITIZE_STRING);
                $sql = 'insert into picture (title, description, image, user_id) values(:title, :description, :image, :user_id)';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':user_id', $user_id);
                $stmt->execute();

                $last_id = $this->conn->lastInsertId("image_id");
                return array("image_id" => $last_id);
            }
        }
    }

    public function loadImageFeed()
    {
        try {
            $sql = 'SELECT a.image, a.title, a.description, b.username FROM picture a INNER JOIN user b ON a.user_id=b.user_id;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $parameters = $stmt->fetchAll();
            $imageFeed = "";
            foreach ($parameters as $value) {
                $imageFeed  .=
                    "<div class='description'>
                    <img src=$value[image] alt=virk />
                    <br/>
                    <p>$value[title]</p>
                    <h3>$value[description]</h3>
                    <br/>
                    <h4>$value[username]</h4>
                    </div>";
            }
            echo "<div class='wrapper'>
            <div class='imagefeed'>
            <h1>Image Feed</h1>" . $imageFeed . "</div>
            </div>";
        } catch (Exception $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }

    public function uploadPicture()
    {
        //måske lav et array med en plads til hver if-statement så man kan checke hvad der går galt
        //ELLER! bare return en string der bestemmer hvad der gik galt
        $head = trim($_POST["head"]);
        $description = trim($_POST["description"]);


        if ((strlen($head) > 25) or (strlen($description) > 250) or ((filesize($_FILES["file"]["tmp_name"]) * 1.35) > 4294967295)) {
            return "Max titlelength: 25 characters.\nMax description lenght: 250 characters.\nImage file might be too large.";
        } else {
            $name = $_FILES['file']['name'];
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            //husk at indsætte head og description også
            $head = filter_var($_POST['head'], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            // Check extension
            if (in_array($imageFileType, $extensions_arr)) {

                // Convert to base64 
                $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                $photo = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
                // Insert record
                $statement = 'insert into picture (title, description, image, user_id) values(:title, :description, :image, :user_id)';
                /*$parameters = array(
                    array(":head", $head), array(":description", $description),
                    array(":photo", $photo), array(":person_id", $_SESSION['id'])
                );

                talkToDB($statement, $parameters);
                */
                $stmt = $this->conn->prepare($statement);
                $stmt->bindParam(':title', $head);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $photo);
                $stmt->bindParam(':user_id', $_SESSION['id']);
                $stmt->execute();


                // Upload file
                //move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
                return "Upload Success";
            } else {
                return "only filtypes allowed are .jpg, .jpeg, .png and .gif";
            }
        }
    }
}
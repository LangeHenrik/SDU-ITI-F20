<?php
class Image extends Database
{

    public function UploadImage()
    {
        $header = filter_var(trim($_POST["image-header"]), FILTER_SANITIZE_STRING);
        $description = filter_var(trim($_POST["image-description"]), FILTER_SANITIZE_STRING);
        if ((strlen($header) > 10) or (strlen($description) > 100)) {
            return "Please be more concise!";
        } else {

            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["image-upload"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


            $extensions_arr = array("jpg", "jpeg", "png", "gif");


            if (in_array($imageFileType, $extensions_arr)) {


                $image_base64 = base64_encode(file_get_contents($_FILES['image-upload']['tmp_name']));
                $img = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

                $statement = 'INSERT INTO images (header, description, image, userid) values(:header, :description, :image, :userid)';

                $stmt = $this->conn->prepare($statement);
                $stmt->bindParam(':header', $header);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $img);
                $stmt->bindParam(':userid', $_SESSION['id']);
                $stmt->execute();

                return "Uploaded Successfully!";
            } else {
                return "Erroneous File type!";
            }
        }
    }

    public function getAllImage($userid)
    {
        $userid = filter_var($userid, FILTER_SANITIZE_STRING);

        $sql = "SELECT imageid, header, description, image FROM images WHERE userid = :userid";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        $result = $stmt->fetchAll();

        for ($i = 0; $i < count($result); $i++) {
            $result[$i]['imageid'] = (int) $result[$i]['imageid'];
            unset($result[$i][0]);
            unset($result[$i][1]);
            unset($result[$i][2]);
            unset($result[$i][3]);
        }

        return $result;
    }

    public function addImage($userid)
    {
        $userid = filter_var($userid, FILTER_SANITIZE_STRING);
        $jsonBody = json_decode($_POST['json']);
        $username = filter_var(trim($jsonBody->username), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($jsonBody->password), FILTER_SANITIZE_STRING);

        $sql = "SELECT userid, username, pwd FROM users WHERE userid = :userid";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();

        $result = $stmt->fetch();

        if ($username === $result['username'] && password_verify($password, $result['pwd'])) {
            $header = filter_var(trim($jsonBody->header), FILTER_SANITIZE_STRING);
            $description = filter_var(trim($jsonBody->description), FILTER_SANITIZE_STRING);
            $image = filter_var(trim($jsonBody->image), FILTER_SANITIZE_STRING);
            if (empty($title) || empty($description) || empty($image)) {
            } elseif ((strlen($title) > 10) or (strlen($description) > 100)) {
            } else {
                $sql = 'INSERT INTO images (header, description, image, userid) values(:header, :description, :image, :userid)';
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':header', $header);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':image', $image);
                $stmt->bindParam(':userid', $userid);
                $stmt->execute();

                $lastid = $this->conn->lastInsertId("imageid");
                return array("imageid" => $lastid);
            }
        }
    }

    public function FeedLoad()
    {
        try {
            $sql = 'SELECT a.image, a.header, a.description, b.username FROM images a INNER JOIN users b ON a.userid=b.userid;';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $parameters = $stmt->fetchAll();
            return $parameters;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


}
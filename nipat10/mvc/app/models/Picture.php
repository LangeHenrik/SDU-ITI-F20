<?php
class Picture extends Database
{

    function getPictures($id)
    {

        $sql = 'SELECT * FROM images Where user_id=:id';
        $images = array();
        $data = $this->conn->prepare($sql);

        $data->bindParam(':id', $id);
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $images[] = array(
                'image' => $OutputData['image'],
                'title' => $OutputData['header'],
                'description' => $OutputData['description']
            );
        }
        echo json_encode($images, JSON_PRETTY_PRINT);
    }

    function postPictures($id)
    {

        session_unset();

        

        $jsonBody = json_decode(file_get_contents('php://input'), true);
        $username = filter_var(trim($jsonBody["username"]), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($jsonBody["password"]), FILTER_SANITIZE_STRING);
        $header = filter_var(trim($jsonBody["title"]), FILTER_SANITIZE_STRING);
        $description = filter_var(trim($jsonBody["description"]), FILTER_SANITIZE_STRING);
        $base64 = $jsonBody["image"];

        $sql = "SELECT * FROM users WHERE username = :username";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC); //fetchAll to get multiple rows


        //Check if password is correct by unhashing and verifying it.
        if (password_verify($password, $row['password'])&& $id == $row['id']) {


            //Successfully log user in and provide information to session.
            $_SESSION["logged_in"] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;


            $pictureName = 'APIPicture';

            $stmt = $this->conn->prepare("INSERT INTO images (header, 
                                                description, image, user_id, name)
                                                VALUES(:header, :description, :image, :user_id, :name)");
            $stmt->bindParam(':user_id', $_SESSION["user_id"]);
            $stmt->bindParam(':header', $header);
            $stmt->bindParam(':name', $pictureName);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $base64);
            $stmt->execute();
            
            $last_id = $this->conn->lastInsertId("id");
                return array("image_id" => $last_id);
        }
    }
}

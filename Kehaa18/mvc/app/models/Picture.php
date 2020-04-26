<?php
class Picture extends Database
{
    public function getPictures($id)
    {
        $sql = 'SELECT * FROM images Where user_id=:id';
        $images = array();
        $data = $this->conn->prepare($sql);

        $data->bindParam(':id', $id);
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $images[] = array(
                'image_id' => $OutputData['id'],
                'title' => $OutputData['header'],
                'description' => $OutputData['description'],
                'image' => $OutputData['image']
            );
        }
        return $images;
    }


    public function postPictures($user_id)
    {
        //Decodes json message from API request and filters/sanitizes its parameters to prevent attacks to the system.
        $jsonBody = json_decode($_POST['json'], true);
        $username = filter_var(trim($jsonBody["username"]), FILTER_SANITIZE_STRING);
        $password = filter_var(trim($jsonBody["password"]), FILTER_SANITIZE_STRING);
        $header = filter_var(trim($jsonBody["title"]), FILTER_SANITIZE_STRING);
        $description = filter_var(trim($jsonBody["description"]), FILTER_SANITIZE_STRING);
        $base64 = $jsonBody["image"];

        $sql = "SELECT * FROM users WHERE username = :username";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $result =false;

        //Check if password is correct by unhashing and verifying it.
        //Also checks whether the passed user_id parameter is the same as the one of the user.
        if (password_verify($password, $row['password'])&& $user_id == $row['id']) {

            //Unset current session.
            session_unset();
            //Successfully log user in and provide information to session.
            $_SESSION["logged_in"] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;


            $pictureName = 'APIPicture';

            //Inserts image to the db.
            $stmt = $this->conn->prepare("INSERT INTO images (header, 
                                                description, image, user_id, name)
                                                VALUES(:header, :description, :image, :user_id, :name)");
            $stmt->bindParam(':user_id', $_SESSION["user_id"]);
            $stmt->bindParam(':header', $header);
            $stmt->bindParam(':name', $pictureName);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $base64);
            $result = $stmt->execute();
        }
        //If the image was succesfully inserted return the last id, otherwise return an error.
        if ($result) {
            $last_id = $this->conn->lastInsertId("id");
            return array("image_id" => $last_id);
        } else {
            return array("image_id" => '!!!Could not upload this image!!!');
        }
    }
}

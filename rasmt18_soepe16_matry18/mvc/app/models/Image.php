<?php
class Image extends Database {

    public function upload($header, $description, $user, $image) {
        $convertedImg = "data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                
        $stmt = $this->conn->prepare("INSERT INTO image (header, description, username, img) VALUES(:header, :description, :username, :image)");
        
        $header = filter_var($header, FILTER_SANITIZE_STRING);
        $stmt->bindParam(':header', $header, PDO::PARAM_STR);

        $description = filter_var($description, FILTER_SANITIZE_STRING);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);

        $user = filter_var($user, FILTER_SANITIZE_STRING);
        $stmt->bindParam(':username', $user, PDO::PARAM_STR);
        
        $stmt->bindParam(':image', $convertedImg, PDO::PARAM_STR);

        $stmt->execute(); 

    }

}
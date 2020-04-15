<?php
class Image extends Database {

    public function upload($header, $description, $user) {
        //https://www.geeksforgeeks.org/php-_files-array-http-file-upload-variables/
        $convertedImg = "data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                
        try {

            $stmt = $this->conn->prepare("INSERT INTO image (title, description, user_id, image) VALUES(:header, :description, :user_id, :image)");
            
            $header = filter_var($header, FILTER_SANITIZE_STRING);
            $stmt->bindParam(':header', $header, PDO::PARAM_STR);
            
            $description = filter_var($description, FILTER_SANITIZE_STRING);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            
            $user = $_SESSION['user_id'];
            $stmt->bindParam(':user_id', $user, PDO::PARAM_STR);
            
            $stmt->bindParam(':image', $convertedImg, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return "You have succesfully uploaded an image";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }

    }

    public function loadImagesFromModel() {
        $stmt = $this->conn->prepare("Select image.title,image.description,image.image,user.username from image LEFT JOIN user ON (image.user_id = user.user_id)");
        $stmt->execute();
        $result = $stmt->fetchAll();
        ?>
        <div class='image'>
        
        <?php 
            foreach ($result as $row) {
                $header = htmlentities($row['title']);
                $description = htmlentities($row['description']);
                $username = htmlentities($row['username']);
                $img = htmlentities($row['image']);
        ?>
            <div class='picture'><b>Title of the image:</b><p><?=$header?></p>
            <br>
            <b>Description:</b><p><?=$description?><p>
            <br>
            <b>Contributer:</b><p><?=$username?><p>
            <br>
            <b>Image:</b>
            <br>
            <img src='<?=$img?>' alt=''></img>
            <br></div>
        <?php
            }
        ?>
        </div>
        <?php
    }

}
?>
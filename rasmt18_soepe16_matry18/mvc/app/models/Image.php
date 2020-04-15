<?php
class Image extends Database {

    public function upload($header, $description, $user, $image) {
        //https://www.geeksforgeeks.org/php-_files-array-http-file-upload-variables/
        $convertedImg = "data:".$_FILES['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                
        try {

            $stmt = $this->conn->prepare("INSERT INTO image (header, description, username, img) VALUES(:header, :description, :username, :image)");
            
            $header = filter_var($header, FILTER_SANITIZE_STRING);
            $stmt->bindParam(':header', $header, PDO::PARAM_STR);
            
            $description = filter_var($description, FILTER_SANITIZE_STRING);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            
            $user = filter_var($user, FILTER_SANITIZE_STRING);
            $stmt->bindParam(':username', $user, PDO::PARAM_STR);
            
            $stmt->bindParam(':image', $convertedImg, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return "You have succesfully uploaded an image";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }

    }

    public function loadImagesFromModel() {
        $stmt = $this->conn->prepare("Select * from image");
        $stmt->execute();
        $result = $stmt->fetchAll();
        ?>
        <div class='image'>
        
        <?php 
            foreach ($result as $row) {
                $header = htmlentities($row['header']);
                $description = htmlentities($row['description']);
                $username = htmlentities($row['username']);
                $img = htmlentities($row['img']);
        ?>
            <div class='picture'>
                <h3 class="text-info">Title of the image:</h3>
                <p><?=$header?></p>
                <h4 class="text-info">Description:</h4>
                <p><?=$description?><p>
                <h4 class="text-info">Contributer:</h4>
                <p><?=$username?><p>
                <h4 class="text-info">Image:</h4>
                <img class="img-fluid rounded" src='<?=$img?>' alt='loaded picture'></img>
                <hr>
            </div>
        <?php
            }
        ?>
        </div>
        <?php
    }

}
?>
<?php
class Image extends Database {

    public function upload($header, $description, $user) {
        //https://www.geeksforgeeks.org/php-_files-array-http-file-upload-variables/
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
        $detectedType = exif_imagetype($_FILES['image']['tmp_name']);
        $error = !in_array($detectedType, $allowedTypes);
        
        if($error == true) {
            return array('danger' => "The chosen filetype was wrong!");
        }
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
            
            if($stmt->execute()) 
            {
                return array('succes' => "You have succesfully uploaded an image");
            }
        } catch (PDOException $e) {
            return array('danger' => 'Something went wrong, make sure you are trying to upload a correct file format');
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
                $header = $row['title'];
                $description = $row['description'];
                $username = $row['username'];
                $img = $row['image'];
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
    
    public function ApiUploadImage($UploadInfo) {

        $userid = filter_var($UploadInfo['userid'], FILTER_SANITIZE_NUMBER_INT);
        $title = filter_var($UploadInfo['title'], FILTER_SANITIZE_STRING);
        $description = filter_var($UploadInfo['description'], FILTER_SANITIZE_STRING);
        $image = $UploadInfo['image'];
        try {
            $stmt = $this->conn->prepare("INSERT INTO image (title, description, user_id, image) VALUES(:title, :description, :user_id, :image)");

            $stmt->bindParam(':user_id', $userid, PDO::PARAM_STR);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            $stmt->execute();

            $stmt = $this->conn->prepare("SELECT image_id FROM image ORDER BY image_id DESC LIMIT 1");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetch();

            return $result;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }


    }

    public function getUserImages($user_id) {

        $sql = "SELECT image, title, description FROM image WHERE image.user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

}
?>
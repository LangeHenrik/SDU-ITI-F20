<?php
class Image extends Database {
    public function upload ($header, $description, $user) {
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_JPG);
        $detectedType = exif_imagetype($_FILES['image']['tmp_name']);
        $error = !in_array($detectedType, $allowedTypes);
        
        if($error == true) {
            return array('danger' => "Wrong file type!");
        }
        $convertedImg = "data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));

        try{
            $stmt = $this->conn->prepare("INSERT INTO image (header, description, username, image) VALUES(:header, :description, :username, :image)");

            $header = filter_var(htmlentities ($header), FILTER_SANITIZE_STRING);
            $stmt->bindParam(':header', $header, PDO::PARAM_STR);

            $description  = filter_var(htmlentities ($description), FILTER_SANITIZE_STRING);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);

            $username = $_SESSION['username'];
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);

            $stmt->bindParam(':image', $convertedImg, PDO::PARAM_STR);

            if ($stmt->execute()) {
                return array ('success'=>"Successfully uploaded!");
            }
        } catch (PDOException $e) {
            return array('danger' => 'Error!');
    }

    public function loadImages () {
        $stmt = $this->conn->prepare ('SELECT images.header, images.description, images.username, images.image FROM images LEFT JOIN user ON (images.username = users.username)");');
        $stmt->execute();
        $result = $stmt->fetchAll();

        ?>

        <div class='image'>
        
        <?php 
            foreach ($result as $row) {
                $header = $row['header'];
                $description = $row['description'];
                $username = $row['username'];
                $img = $row['image'];
        ?>
            <div class='picture'>
                <h3 class="imagetext">Header:</h3>
                <p><?=$header?></p>
                
                <h4 class="imagetext">Image:</h4>
                <img class="img-fluid rounded" src='<?=$img?>' alt='loaded picture'></img>
                <h4 class="imagetext"><?=$username?></h4>
                <h4>: <h4>
                <h4 class="imagetext"><?=$description?></h4>
                <hr>
            </div>
        <?php
            }
        ?>
        </div>
        <?php
    }

    public function ApiImage($UP_info) {

        $username = filter_var(htmlentities($UP_info['username']), FILTER_SANITIZE_NUMBER_INT);
        $header = filter_var(htmlentities($UP_info['header']), FILTER_SANITIZE_STRING);
        $description = filter_var(htmlentities($UP_info['description']), FILTER_SANITIZE_STRING);
        $image = $UP_info['image'];
        try {
            $stmt = $this->conn->prepare("INSERT INTO images (header, description, username, image) VALUES(:header, :description, :username, :image)");

            $stmt->bindParam(':username', $userid, PDO::PARAM_STR);
            $stmt->bindParam(':header', $header, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            $stmt->execute();

            $stmt = $this->conn->prepare("SELECT imageid FROM images ORDER BY imageid DESC LIMIT 1");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetch();

            return $result;
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }


    }

    public function getUserImages($username) {

        $sql = "SELECT image, header, description FROM images WHERE image.username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

}
?>
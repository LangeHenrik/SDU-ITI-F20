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

    public function loadImagesFromModel() {
        $stmt = $conn->prepare("Select * from image");
        $stmt->execute();
        $result = $stmt->fetchAll();
        ?>
        <div class='image'>
        
        <?php 
            foreach ($result as $row) {
        ?>
            <div class='picture'><b>Title of the image:</b> <p> <?php $row[header] ?> </p>
            <br>
            <b>Description:</b> <p> <?php $row[description] ?> <p>
            <br>
            <b>Contributer:</b> <p> <?php $row[username] ?> <p>
            <br>
            <b>Image:</b>
            <br>
            <img src= '<?php $row[img]?>' alt=''></img>
            <br></div>
        <?php
            }
        ?>
        </div>
        <?php
    }

}
?>
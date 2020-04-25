<?php
class Image extends Database {
    public function upload ($headerA, $descriptionA, $usernameA) {
        if(array_key_exists('image-upload', $_POST)) {
            require 'db_config.php';
            try{
                $connection = new PDO("mysql:host=$server;port=$portdb;dbname=$database", 
                $username_database, $password_database, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $connection->exec("SET wait_timeout=3000;");
                $stmt = $connection->prepare("INSERT INTO images (header, description, username, image) VALUES(:header, :description, :username, :image)");
                
                $headerA = filter_var($_POST['image-header'], FILTER_SANITIZE_STRING);
                $headerXSS = htmlspecialchars($headerA);
                $stmt->bindParam(':header', $headerXSS, PDO::PARAM_STR);
                
                $descriptionA = filter_var($_POST['image-description'], FILTER_SANITIZE_STRING);
                $descriptionXSS = htmlentities($descriptionA);
                $stmt->bindParam(':description', $descriptionXSS, PDO::PARAM_STR);
                
                $usernameA = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING);
                $usernameXSS = htmlspecialchars($usernameA);
                $stmt->bindParam(':username', $usernameXSS, PDO::PARAM_STR);
                
                $uploadIMG = "data:".$_FILES['image-upload']['type'].";base64,".base64_encode(file_get_contents($_FILES['image-upload']['tmp_name']));
                $stmt->bindParam(':image', $uploadIMG, PDO::PARAM_STR);
    
                $stmt->execute(); 
                $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
            $connection = null;
        }
    }

    public function loadImages () {
        require 'db_config.php';
    try{
        $connection = new PDO("mysql:host=$server;port=$portdb;dbname=$database", $username_database,
        $password_database, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $stmt = $connection->prepare("SELECT * FROM images");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        //print_r($result);
        echo "<div>";
            foreach($result as $row){
                echo "<br><div id=formContent><br>Image Title: $row[header]<br>";
                echo "<img src='$row[image]'></img><br>";
                echo "<p>$row[username]: $row[description]</p><br>";
                echo "</div>";
            }
        echo "</div>";
    }
    catch (PDOException $error) {
        #echo "Error: " . $error->getMessage();
        }
    $connection = null;
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
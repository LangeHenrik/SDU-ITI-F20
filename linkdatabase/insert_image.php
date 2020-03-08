<?php
    if(array_key_exists('image-upload', $_POST)) {
        require 'config.php';
        try{
            $uploadIMG = "data:".$_FILES['image-upload']['type'].";base64,".base64_encode(file_get_contents($_FILES['image-upload']['tmp_name']));
            $connection = new PDO("mysql:host=$server;dbname=$database", 
            $username_database, $password_database, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
            
            $stmt->bindParam(':image', $uploadIMG, PDO::PARAM_STR);

            $stmt->execute(); 
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
        $connection = null;
    }
?>
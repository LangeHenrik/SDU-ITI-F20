<?php
    if(array_key_exists('signup-submit', $_POST)) {
        require 'config.php';
        try{
            $image = "data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));
            $connection = new PDO("mysql:host=$server;dbname=$database", 
            $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $stmt = $connection->prepare("INSERT INTO image (header, description, username, image) VALUES(:header, :description, :username, :image)");
            
            $header = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
            $headerXSS = htmlspecialchars($tempHeader);
            $stmt->bindParam(':header', $tempHeaderXSS, PDO::PARAM_STR);

            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $descriptionXSS = htmlentities($tempDescription);
            $stmt->bindParam(':description', $tempDescriptionXSS, PDO::PARAM_STR);

            $username = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING);
            $usernameXSS = htmlspecialchars($tempUsername);
            $stmt->bindParam(':username', $tempUsernameXSS, PDO::PARAM_STR);
            
            $stmt->bindParam(':image', $convertedImg, PDO::PARAM_STR);

            $stmt->execute(); 
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $connection = null;
    }
?>
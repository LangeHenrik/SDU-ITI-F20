<?php
        if(array_key_exists('submit', $_POST)) {
        require_once 'db_config.php';
                try {
                $convertedImg = "data:".$_FILES['image']['type'].";base64,".base64_encode(file_get_contents($_FILES['image']['tmp_name']));
                
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
                $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $stmt = $conn->prepare("INSERT INTO image (header, description, username, img) VALUES(:header, :description, :username, :image)");
                
                $tempHeader = filter_var($_POST['header'], FILTER_SANITIZE_STRING);
                $tempHeaderXSS = htmlspecialchars($tempHeader);
                $stmt->bindParam(':header', $tempHeaderXSS, PDO::PARAM_STR);

                $tempDescription = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
                $tempDescriptionXSS = htmlentities($tempDescription);
                $stmt->bindParam(':description', $tempDescriptionXSS, PDO::PARAM_STR);

                $tempUsername = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING);
                $tempUsernameXSS = htmlspecialchars($tempUsername);
                $stmt->bindParam(':username', $tempUsernameXSS, PDO::PARAM_STR);
                
                $stmt->bindParam(':image', $convertedImg, PDO::PARAM_STR);

                $stmt->execute(); 
                $stmt->setFetchMode(PDO::FETCH_ASSOC); 

                } 
                catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                }
        $conn = null;
        }
    ?>
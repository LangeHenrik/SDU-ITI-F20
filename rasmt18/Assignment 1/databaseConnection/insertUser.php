<?php
        if(array_key_exists('submit', $_POST)) {
            try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
            $password,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES(:username, :password)");
            
            $tempUser = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            $tempUserXSS = htmlspecialchars($tempUser);
            $stmt->bindParam(':username', $tempUserXSS, PDO::PARAM_STR);

            $tempPassword = filter_var(password_hash($_POST['password'], PASSWORD_DEFAULT), FILTER_SANITIZE_STRING);
            $tempPasswordXSS = htmlspecialchars($tempPassword);
            $stmt->bindParam(':password', $tempPasswordXSS, PDO::PARAM_STR);

            $stmt->execute(); 
            $stmt->setFetchMode(PDO::FETCH_ASSOC); 

            } 
            catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
        $conn = null;
        }
    ?> 

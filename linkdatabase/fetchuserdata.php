<?php
    require 'config.php';
        try {
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username_database,
        $password_database,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $stmt = $connection->prepare("USERNAME");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $stmt->fetchAll();
            foreach($result as $row) {
                echo "<p>$row[username]</p>";
            }
        } 
        catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
        }
    $connection = null;
    ?>
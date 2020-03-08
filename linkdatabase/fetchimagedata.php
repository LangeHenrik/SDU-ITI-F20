<?php
    require 'config.php';
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
                echo "<div id=formContent>Image Title: <p>$row[header]</p><br>";
                echo "<img src='$row[image]'></img><br>";
                echo "<p>$row[username]</p>: <p>$row[description]</p><br>";
                echo "</div>";
            }
        echo "</div>";
    }
    catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
        }
    $connection = null;
?>
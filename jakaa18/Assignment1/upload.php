<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Insert image data into database
         */

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "root";

        $db = "jakaa18_jesha18";
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

        try {
            $conn = new PDO($dsn, $dbusername, $dbpassword, $options);
            // set the PDO error mode to exception

            echo "DB Connected successfully \n";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $user = $_SESSION["username"];
        $header = $_POST["header"];
        $description = $_POST["description"];
        //Insert image content into database
        $insert = $conn->query("INSERT into pictures (header, description, user, picture) VALUES ('$header', '$description', '$user', '$imgContent')");
        if($insert){
            echo "File uploaded successfully.";
        }else{
            echo "File upload failed, please try again.";
        }
    }else{
        echo "Please select an image file to upload.";
    }
}

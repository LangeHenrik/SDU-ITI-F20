<?php
if(isset($_GET["grab"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        /*
         * Grab image data from database
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
        //Grab image content from database
        $grab = $conn->query("SELECT * FROM pictures WHERE pic_id = [CURRENT_SELECTION].pic_id");
        if($grab){
            echo "File grabbed successfully.";
        }else{
            echo "File grab failed, please try again.";
        }
    }else{
        echo "Something went wrong. This error shouldn't be displayed.";
    }
}

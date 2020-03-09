<?php
if(isset($_POST["imgSubmit"])){
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
		require_once 'db_connect.php';
		
		
        $user = $_SESSION["sessionUser"];
        $header = $_POST["header"];
        $description = $_POST["imgDescription"];
        //Insert image content into database
        $insert = $conn->query("INSERT into pictures (header, description, user, picture) VALUES ('$header', '$description', '$user', '$imgContent')");
        if($insert){
            echo "File uploaded successfully.";
            header("Location: index.php");
            exit;
        }else{
            echo "File upload failed, please try again.";
        }
    }else{
        echo "Please select an image file to upload.";
    }
}

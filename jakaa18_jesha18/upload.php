<?php
if(isset($_POST["imgSubmit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $type = pathinfo($image, PATHINFO_EXTENSION);
        $imgContent = 'data:image/' . $type . ';base64' . base64_encode(file_get_contents($image));

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
        $insert = $conn->prepare("INSERT into pictures (header, description, user, picture) VALUES (?, ?, ?, ?)");
        $insert->bindParam(1, htmlspecialchars($header));
        $insert->bindParam(2, htmlspecialchars($description));
        $insert->bindParam(3, htmlspecialchars($user));
        $insert->bindParam(4, $imgContent, PDO::PARAM_LOB);
        if($insert->execute()){
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

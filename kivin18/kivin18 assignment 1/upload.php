<?php
session_start();
require("db_connection.php");
if ($_SESSION["logged_in"] ?? false) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir);
        echo "Directory created. ";
    }
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = true;
        } else {
            echo "File is not an image.";
            $uploadOk = false;
        }
    }
    // Check file size
    if ($_FILES["image"]["size"] > 1000000) {
        echo "Your file is too large.";
        $uploadOk = false;
    }

    // Check file type
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "jfif") {
        echo "Only JPG, JPEG, PNG & JFIF files are allowed.";
        $uploadOk = false;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "File already exists.";
        $uploadOk = false;
    }

    if (!$uploadOk) {
        echo " Your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $stmt = $pdo->prepare('INSERT INTO image(username, image_path, header, description) VALUES (?, ?, ?, ?)');
            $path = htmlentities($_FILES["image"]["name"]);
            $header = htmlentities($_POST["imageHeader"]);
            $description = htmlentities($_POST["description"]);
            $stmt->execute([$_SESSION["user"], $path, $header, $description]);
            echo "The image " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "There was an error uploading your file.";
        }
    }
}
?>

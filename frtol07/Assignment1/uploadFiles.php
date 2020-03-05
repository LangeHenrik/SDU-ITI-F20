<?php
ob_start();

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image feed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
<br><br><br><br><br><br>

<div class="container">
    <label class="label">Click here to upload another file></label>
    <form action="uploadChooseFile.php">
        <input class="bigBtn" type="submit" value="Go upload" />
    </form>
</div>
<br>
<br>
<br>
<br>

</body>

</html>


<?php

require_once 'db_config.php';
include 'connect.php';



$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

        echo $target_file;

        $name = $target_file;
        $user = $_SESSION['username'];
        $header = $_POST['header'];
        $description = $_POST['description'];
        $image = $target_file;

//         Prepared statement
        $query = "INSERT INTO images (name,user,description,header,image) VALUES(:name,:user,:description,:header,:image)";
        $query = $pdo->prepare($query);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':user', $user, PDO::PARAM_STR);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':header', $header, PDO::PARAM_STR);
        $query->bindParam(':image', $image, PDO::PARAM_STR);




        $query->execute();

        header("location: imageFeed.php");

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

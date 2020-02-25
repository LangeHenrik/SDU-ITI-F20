<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');
session_start();
?>

<!DOCTYPE html>
<header>
    <title>Upload</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/upload_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">
</header>

<body>
    <h1>Upload page</h1>
    <div class="navbar" id="navbar">
        <a class="active" href="index.php">Home</a>
        <a href="imagefeed_page.php">Image feed</a>
        <a href="userlist_page.php">Userlist</a>
    </div>

    <div id="upload-picture-container">
        <form method="post" action="upload_page.php" enctype="multipart/form-data">
            <label for="file">Please select a file: </label>
            <br>
            <input type="file" id="imageToBeUploaded" name="imageToBeUploaded" />
            <br>
            <label for="title" id="label-title">Enter title: </label>
            <input name="title" id="title" class="title" required />
            <br>
            <textarea id="description" name="description" maxlength="250" placeholder="Write a comment"></textarea>
            <br>
            <input type="submit" name="uploadbtn" id="uploadbtn" value="Upload image" />
        </form>

        <?php

        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
        $usercontroller = new UserController();

        if (isset($_POST['uploadbtn'])) {

            $imageFile = $_FILES["imageToBeUploaded"]["name"];
            $target_dir = "../upload/";
            $target_file = $target_dir . basename($_FILES["imageToBeUploaded"]["name"]);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            if (in_array($imageFileType, $extensions_arr)) {

                // Read image path, convert to base64 encoding
                $imageConvertTo_base64 = base64_encode(file_get_contents($_FILES['imageToBeUploaded']['tmp_name']));

                // Format the image SRC:  data:{mime};base64,{data};
                $image = 'data:image/' . $imageFileType . ';base64,' . $imageConvertTo_base64;

                $usercontroller->uploadImage($_SESSION['username'], $image, $title, $description);
            }
        }

        ?>
    </div>
    <a href="index.php">back to index</a>

</body>

</html>
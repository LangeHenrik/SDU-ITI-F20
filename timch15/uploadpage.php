<?php
session_start();
require_once 'login_check.php';
require_once 'database_controller.php';
include_once 'upload.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>ITI Ass.1 - Upload Page</title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <?php include 'menu.php'; ?>
    </nav>

    <div class="wrapper">
        <div class="content">

        <!-- The code for the form action can be found in the upload.php file. -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Select image to upload: </label>
            <input type="file" name="fileToUpload" id="fileToUpload">                
            <br/>
            <label for="image-header">Image header: </label>
            <input type="text" name="image-header" id="image-header">
            <br/>
            <label for="image-description">Image description: </label>
            <input type="text" name="image-description" id="image-description">
            <br/>
            <input type="submit" value="Upload Image" name="submit">
            <p class="upload-error" id="upload-error"><?= $error_message ?? ''?></p>
            <p class="upload-success" id="upload-success"><?= $success_message ?? ''?></p>
        </form>

        </div>
    </div>
</body>

</html>
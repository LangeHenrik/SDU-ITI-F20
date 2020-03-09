<?php
session_start();
if (!(isset($_SESSION['session_id']))) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="header.css">
        <meta name="description" content="test meta description">
        <meta name=viewport content="width=device-width, initial-scale=1">
    </head>

    <body>
        <a href="index.php">Back</a>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="header" placeholder="header...">
            <textarea name="description" rows="4" cols="50" placeholder="description"></textarea>
            <input type="file" name="file">
            <button type="submit" name="submit">Upload image</button>
        </form>
    </body>

</html>


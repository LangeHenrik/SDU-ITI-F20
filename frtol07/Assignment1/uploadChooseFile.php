<?php
ob_start();

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload file</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<!--Comment-->

<body>
<br><br><br><br><br><br>

<div class="container">
    <label class="label"> Click here to log out</label>
    <br><br>

    <form action="logout.php">
        <input class="bigBtn" type="submit" value="Log out" />
    </form>
</div>

<br><br><br><br>

<div class="container">
    <label class="label"> Image feed</label>
    <br><br>
<!--    <a href="imageFeed.php">go to Image feed</a>-->

    <form action="imageFeed.php">
        <input class="bigBtn" type="submit" value="Go to Image feed" />
    </form>
</div>

<br>
<br>
<br>
<div class="container">
    <form action="uploadFiles.php" method="post" enctype="multipart/form-data">
        <label class="label"> Header:</label>
        <br><br>
        <textarea class="txtArea" id="header" name="header"> </textarea>
        <br><br>
        <label class="label"> Description:</label>
        <br><br>
        <textarea class="txtArea" id="description" name="description"> </textarea>
        <br><br>
        <label class="label"> Select image to upload:</label>
        <br> <br>
        <input value="Choose file" type="file" name="fileToUpload" id="fileToUpload" class="btn">
        <br><br><br>
        <input type="submit" value="Upload Image" name="submit" class="bigBtn">
    </form>
</div>


</body>

</html>



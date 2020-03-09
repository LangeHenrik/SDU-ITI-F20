<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (is_null($_SESSION["username"])) {
    header("Location:index.html");
    exit();
}

require_once 'backend/config.php';


if (isset($_FILES['image'])) {
    $title = filter_var($_POST["title"], FILTER_SANITIZE_STRING);

    $base64 = '/' . ltrim($_POST['dataURL'], "data:image/jpeg;base64,");

    $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);

    try {
        $db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db_conn->prepare("insert into photo set author=?, title=?, description=?, img=?");
        $stmt->execute([$_SESSION["username"], $title, $description, $base64]);
        header("location: feed.php",  true,  301 );  exit;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/common.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<ul>
    <li><a href="feed.php">Feed</a></li>
    <li><a href="users.php">Users</a></li>
    <li><a href="upload.php">Upload</a></li>
    <li><a href="backend/logout.php">Log Out</a></li>
</ul>
<div class="form-box">
    <form ENCTYPE="multipart/form-data" method="post">
        <div class="form-header">
            <h3>Upload Picture</h3>
        </div>
        <div class="form-group">
            <label for="title">Title:<br></label>
            <input type="text" class="form-input" name="title" maxlength="32" required>
            <br>
            <label for="description">Description:<br></label>
            <input type="text" class="form-input" name="description" maxlength="120" required>
            <br>
            <input type="file" id="imageUpload" name="image" required/>
            <input type="hidden" id="dataURL" name="dataURL"/>
            <button class="form-button" id="imgUpload" type="submit">Upload</button>
        </div>
        <div class="preview">
            <canvas id="myCanvas" width="200" height="200" style="border:1px solid #d3d3d3;">
                Your browser does not support the HTML5 canvas tag.
            </canvas>
        </div>
    </form>
</div>
<script src="js/upload.js"></script>
</body>
</html>

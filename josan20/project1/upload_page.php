<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require 'upload.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Page</title>
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>
<!--NAVIGATION BAR-->
<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
    }

    li a {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;
    }

    /* Change the link color on hover */
    li a:hover {
        background-color: #555;
        color: white;
    }

    .active {
        background-color: #4CAF50;
        color: white;
    }
</style>
<nav>
    <ul>
        <li><a href="welcome.php">Welcome</a></li>
        <li><a href="login.php">LogIn</a></li>
        <li><a href="register.php">Registration</a></li>
        <li><a class="active" href="upload_page.php">Upload</a></li>
        <li><a href="image_feed_page.php">Image Feed</a></li>
        <li><a href="user_list_page.php">User list</a></li>
    </ul>
</nav>
<div class="page-header">
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our for upload.</h1>
</div>
<p>
    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
</p>
<form action="#" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="text" name="header" id="header" placeholder="Header">
    <input type="text" name="description" id="description" placeholder="Description">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
//Show names of pages which are already in on upload page

//define('IMAGEPATH', 'uploads/');
//echo "<h2>Which images are already in?</h2>";
//foreach(glob(IMAGEPATH.'*') as $filename){
//    echo basename($filename) . "<br>";
//}
//?>
</body>
</html>
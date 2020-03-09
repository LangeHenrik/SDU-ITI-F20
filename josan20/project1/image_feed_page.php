<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Feed</title>
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
        <li><a href="upload_page.php">Upload</a></li>
        <li><a class="active" href="image_feed_page.php">Image Feed</a></li>
        <li><a href="user_list_page.php">User list</a></li>
    </ul>
</nav>
<div class="page-header">
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our for feed image.</h1>
</div>
<p>
    <a href="logout.php">Sign Out of Your Account</a>
</p>
<?php
define('IMAGEPATH', 'uploads/');
foreach (glob(IMAGEPATH . '*') as $filename) {

    $image_name = basename($filename);
    echo $image_name . "\n";
    $call_image = "<img src=\"/" . IMAGEPATH . $image_name . "\" width=\"280\" height=\"125\" title=\"Logo of a company\" alt=\"" . $image_name . "\" />";
    echo $call_image;
}
?>
</body>
</html>
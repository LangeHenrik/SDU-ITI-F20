<?php

//Starts session for all pages that include header.
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>ITI - Mandatory Assignment - Kenneth Haahr</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>

<nav class="menu">
<ul>
<li><a href="index.php">Frontpage</A></li>
<li><a href="register.php">Registration</A></li>
<li><a href="upload.php">Upload-images</A></li>
<li><a href="imageFeed.php">Image-Feed</A></li>
<li><a href="userlist.php">User list</A></li>
</ul>


<?php
        //Check whether user is logged in and modifies the navigation bar accordingly.
        //If user is logged in.
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo '<div class="header-logout-main">
            <ul><li><p>Welcome '."$username".'! </p></li>
            <li><form action="logout.php" method="post">
            <button type="submit" name="logout">Logout</button>
            </form></li></ul>';

        }
        else {
            //If user is not logged in.
            echo '<div class="header-logout-main">
            <li><a href="register.php">Register</a></li>'
            ;
        }

?>




</nav>
</header>

<!DOCTYPE html>
<html>
<head>
<title>ITI - Mandatory Assignment - Kenneth Haahr</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/nipat10/mvc/public/css/style.css">
</head>
<body>

<header>

<nav class="menu">
<ul>
<li><a href="/nipat10/mvc/public/home">Frontpage</A></li>
<li><a href="/nipat10/mvc/public/register">Registration</A></li>
<li><a href="/nipat10/mvc/public/upload">Upload-images</A></li>
<li><a href="/nipat10/mvc/public/imageFeed">Image-Feed</A></li>
<li><a href="/nipat10/mvc/public/user/users">User list</A></li>
</ul>


<?php
        //Check whether user is logged in and modifies the navigation bar accordingly.
        //If user is logged in.
        if(isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo '<div class="header-logout-main">
            <ul><li><p>Welcome '."$username".'! </p></li>
            <li><form action="/nipat10/mvc/public/home/logout" method="post">
            <button type="submit" name="logout">Logout</button>
            </form></li></ul>';

        }
        else {
            //If user is not logged in.
            echo '<div class="header-logout-main">
            <li><a href="/nipat10/mvc/public/home/register">Register</a></li>'
            ;
        }

?>




</nav>
</header>

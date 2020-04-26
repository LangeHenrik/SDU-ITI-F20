<!DOCTYPE html>
<html>
<head>
<title>ITI - Mandatory Assignment - Kenneth Haahr</title>

<script
  src="https://code.jquery.com/jquery-3.5.0.min.js"
  integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
  crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#btn").click(function() {
                $("#ajax").load("/nipat10/mvc/public/js/data.txt");
            });
        });
    </script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/nipat10/mvc/public/css/style.css">
<script src="/nipat10/mvc/public/js/jsFile.js"></script>
</head>
<body>

<header>

<nav class="menu">
<ul>
<li><a href="/nipat10/mvc/public/home">Frontpage</A></li>
<li><a href="/nipat10/mvc/public/home/register">Registration</A></li>
<li><a href="/nipat10/mvc/public/image/upload">Upload-images</A></li>
<li><a href="/nipat10/mvc/public/image/images">Image-Feed</A></li>
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

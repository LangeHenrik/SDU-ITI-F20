<?php

require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');
session_start();


?>
<!DOCTYPE html>

<header>
    <title>Index</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en"> 
        
</header>

<body>
    <div id="main-wrapper">
        <h2 class="front_page-header">Index page</h2>
        <h3 class="front_page-subheader">Welcome to the index page
            <?php
            if (!empty($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo $username;
            }
            ?>
            </h2>

            <div class="navbar" id="navbar">
                <a class="active" href="#home">Home</a>
                <a href="upload_page.php">Upload</a>
                <a href="imagefeed_page.php">Image feed</a>
                <a href="userlist_page.php">Userlist</a>
            </div>
            <form action="index.php" method="post">
                <div class="inner_container">
                    <button class="logout_button" name="logoutbtn" type="submit">Log Out</button>
                </div>
            </form>
            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_POST['logoutbtn'])) {

                header('Location: front_page.php');
                session_destroy();
                unset($_SESSION['username']);
            }


            ?>
    </div>
</body>

<!--
<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>
-->

</html>
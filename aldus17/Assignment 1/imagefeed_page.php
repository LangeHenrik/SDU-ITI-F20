<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');
session_start();

$usercontroller = new UserController();
$userimagefeedArray = $usercontroller->getAllUserImageFeed();
UserController::logout();
?>

<!DOCTYPE html>

<header>
    <title>Imagefeed</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/imagefeed_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="js/ajaxCallImages.js"></script>
    <html lang="en">

</header>

<body>
    <div class="navbar" id="navbar">
        <ul>
            <li><a class="active" href="front_page.php">Home</a></li>
            <li> <a href="upload_page.php">Upload</a></li>
            <li> <a href="#imagefeed">Imagefeed</a></li>
            <li> <a href="userlist_page.php">Userlist</a></li>

            <li>
                <form method="post">
                    <div class="inner_container">
                        <button class="logoutbtn" name="logoutbtn" type="submit">Log Out</button>
                    </div>
                </form>
            </li>

        </ul>
    </div>

    <div class="imagefeed_wrapper">
        <div class="imagefeed_content">
            <h1>All posted images</h1>
            <h4>
                Search for username: 
                <input type="text" class="search" name="search" id="search" placeholder="search for username" onload="getUserImages(this.value);" onkeyup="getUserImages(this.value);" />
            </h4>
            <div class="imagefeed" id="imagefeed">
            </div>

        </div>
    </div>

</body>

<!--
<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>
-->
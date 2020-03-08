<?php
    #session_start();
    require 'config.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="./css/style.css" >
    </head>
    <body>
        <div class="topnav">
            <a href="index.php">Home</a>
            <a href="signup.php">Sign Up</a>
            <a href="upload_image.php">Upload Image</a>
            <a href="feed.php">Feeds</a>
            <a href="user_list.php">User List</a>
            <?php 
                if(isset($_SESSION['username'])){
                    echo "<a href='logout.php'><input type=button value=Logout name=logout></a>";
                } else { ?>
                    <div class="login-container">    
                        <form name="login" action="feed.php" method="POST">
                            <input type="text" name="username-login" id="username-login" placeholder="Username">
                            <input type="password" name="pwd-login" id="pwd-login" placeholder="Password">
                            <button type="submit" name="login-submit">Log-in</button>
                        </form>
                    </div>
            <?php } ?>
        </div>


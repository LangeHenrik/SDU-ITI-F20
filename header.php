<?php
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
            <div class="login-container">    
                <form action="./includes/login.php" method="post">
                    <input type="text" name="username-login" id="username-login" placeholder="Username">
                    <input type="password" name="password-login" id="password-login" placeholder="Password">
                    <button type="submit" name="login-submit">Log-in</button>
                </form>
            </div>
        </div>
    </body>
</html>
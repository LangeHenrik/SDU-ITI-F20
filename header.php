<?php
    require 'config.php';
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="style.css" >
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                    <li><a href="upload_image.php">Upload Image</a></li>
                    <li><a href="feed.php">Feed</a></li>
                    <li><a href="user_list.php">Userlist</a></li>
                </ul>
                <br />
                <div>
                    <form action="includes\login.php" method="post">
                        <input type="text" name="username-login" id="username-login" placeholder="Username">
                        <input type="password" name="password-login" id="password-login" placeholder="Password">
                        <button type="submit" name="login-submit">Log-in</button>
                    </form>
                    <br />
                    <form action="includes\logout.php" method="post">
                        <button type="submit" name="logout-submit">Log-out</button>
                    </form>
                </div>
            </nav>
        </header>
    </body>
</html>
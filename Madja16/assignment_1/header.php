<?php 
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="header.css">
        <meta name="description" content="test meta description">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>my great title</title>
    </head>
    <body>
    
        <header>
            <div>
                <?php 
                if (isset($_SESSION['session_id'])) {
                    echo '<form action="logout.inc.php" method="POST">
                    <button type="submit" name="logout-submit">Logout</button>
                    </form>';
                }
                else {
                    echo '<form action="login.inc.php" method="POST">
                    <input type="text" name="username_header" placeholder="Username">
                    <input type="password" name="pwd_header" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                    </form>
                    <a href="signup.php">Signup</a>';
                }
                ?>

                <!-- login form
                <form action="login.inc.php" method="POST">
                    <input type="text" name="username_header" placeholder="Username">
                    <input type="password" name="pwd_header" placeholder="Password">
                    <button type="submit" name="login-submit">Login</button>
                </form>
            -->

                <!-- logout form
                <form action="logout.inc.php" method="POST">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>
            -->
            </div>
        </header>



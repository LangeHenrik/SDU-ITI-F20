<?php
    include 'includes/autoload.php';

?>

<!DOCTYPE html>
<html>   
    <head>
        <title>Front page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    </head>
    <body>
        <h1> This is the front page </h1>
        <form method="POST">
            <input type="submit" name="logout" id="logout" value="Logout"/>
        </form>
        <?php

            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if(isset($_POST['logout'])) {
                echo 'logout';
                $_SESSION['logged_in'] = false;
                header ("Location: index.php");
            }

        ?>

    </body>
</html>
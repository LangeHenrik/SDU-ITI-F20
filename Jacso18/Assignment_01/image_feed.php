<?php
    include 'includes/autoload.php';

?>

<!DOCTYPE html>
<html>   
    <head>
        <title>Image Feed</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <html lang="en">        
    </head>
    <body>
        <ul class="menu">
                <li><a href="image_feed.php">Image feed</a></li>
                <li><a href="upload.php">Upload picture</a></li>
                <li><a href="#">Users</a></li>
        </ul>

        <h1> This is the front page </h1>
        
        <form method="POST">
            <input type="submit" name="logout" id="logout" value="Logout"/>
        </form>
        
        <?php
            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if($_SESSION['logged_in'] == false){
                header ("Location: index.php");
            }  

            if(isset($_POST['logout'])) {
                echo 'logout';
                $_SESSION['logged_in'] = false;
                header ("Location: index.php");
            }
        ?>

    </body>
</html>
<?php
    include 'includes/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Front page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <html lang="en">
    </head>
    <body>
        <form method="POST">
            <label for="username">Username</label>
            <br>
            <input type="text" name="username" placeholder="username" id="username" />
            <br>
            <label for="password">Password</label>
            <br>
            <input name="password" type="password" placeholder="password" />
            <br>
            <input type="submit" name="login" id="login" value="login" />
            <br>
            <a href="create_account.php">create account</a>
        </form>
        <?php
            

            if(session_status() == PHP_SESSION_NONE) {
                session_start();
                $_SESSION['logged_in'] = null;
            }
            
            if($_SESSION['logged_in'] == true){
                header ("Location: image_feed.php");
            }  


            if(isset($_POST['login'])) {
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
                $userController = new UserController();
                if($userController->validateUser($username, $password)==true){
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $username;
                    header ("Location: image_feed.php");
                } else {
                    $_SESSION['logged_in'] = false;                  
                }

            }
        ?>
    </body>
</html>
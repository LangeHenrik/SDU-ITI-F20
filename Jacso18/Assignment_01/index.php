<?php
    include 'includes/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Front page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/CSS/stylesheet.css">
        <html lang="en">
    </head>
    <body>
        <div class="div-form">
        <form class="form" method="POST">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" id="username" />
            <i class="fas fa-key"></i>
            <input type="password" name="password"  placeholder="Password" />
            <input type="submit" name="login" id="login" value="login" />
            <a href="create_account.php">create account</a>
        </form>
        </div>
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
<?php
    include 'includes/autoload.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="POST">
            <label for="email">Email Adress</label>
            <br>
            <input type="text" name="email" placeholder="email" id="email" />
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
            }

            if($_SESSION['logged_in'] == true){
                header ("Location: front_page.php");
            } 

            if(isset($_POST['login'])) {
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
                $userController = new UserController();
                if($userController->validateUser($email, $password)==true){
                    $_SESSION['logged_in'] = true;
                    header ("Location: front_page.php"); exit;
                } else {
                    $_SESSION['logged_in'] = false;
                }

            }
        ?>
    </body>
</html>
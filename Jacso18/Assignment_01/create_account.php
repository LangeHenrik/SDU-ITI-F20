<?php
    include 'includes/autoload.php';

?>

<!DOCTYPE html>
<html>   
    <head>        
        <title>Create Account</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="/javascript/javascript.js"></script>
        <link rel="stylesheet" type="text/css" href="/CSS/stylesheet.css">
    </head>
    <body>
        <form onsubmit="return checkform();" method="POST">
            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name"/>
            <br>
            <label for="password">Password</label>
            <br>
            <input type="password" name="password" id="password"/>
            <br>
            <label for="email">Email Adress</label>
            <br>
            <input type="text" name="email" id="email"/>
            <br>
            <input type="submit" name="submit" id="submit" value="Create"/>
        </form>

        <?php

            if(session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        
            if(isset($_POST['submit'])) {
                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
                
                $userController = new UserController();
                if(sizeof($userController->getUserFromEmail($email)) <= 0){
                    $userController->createUser($email,$password,$name);
                } else {
                    echo 'Mail has already been used';
                }
                
            }
        ?>
    </body>
</html>
<?php

require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');

?>
<!DOCTYPE html>

<header>
    <title>login / frontpage</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/front_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">

</header>

<body>
    <div id="main-wrapper">
        <h1>Front page</h1>
        <h2>Login</h2>

        <form method="post">
            <div class="inner_login_form_container">
                <label><b>Username: </b></label>
                <input name='username' id='username' placeholder='username' />

                <label><b>Password: </b></label>
                <input name='password' type='password' placeholder='password' />
                <input type='submit' name='loginbtn' value='login' />
                <button name="registerReferBtn">Register</button>
            </div>
        </form>

        <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['loginbtn'])) {

            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $usercontrol = new UserController();

            if ($usercontrol->validateUserForLogin($username, $password) == true) {

                //HTTP::redirect("index.php");
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                header("Location: index.php");
                echo 'Success login';
                exit;
            } else {
                //HTTP::redirect("front_page.php");
                $_SESSION['logged_in'] = false;
                echo 'Fail login';
                header("Location: front_page.php");
            }
        }
        if (isset($_POST['registerReferBtn'])) {
            header("Location: registration_page.php");
        }

        ?>
    </div>
</body>
<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>

</html>
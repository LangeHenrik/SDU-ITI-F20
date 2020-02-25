<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');

?>
<!DOCTYPE html>

<header>
    <title>Registration</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/formCheck.js"></script>
    <link rel="stylesheet" href="css/registration_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en"> 
        
</header>

<body>
    <div class="register_form_wrapper">
        <form method="post" onsubmit="checkForm(); validatePassword();" oninput="checkForm()">
            <div class="inner_register_form_container" id="inner-register-form-container">

                <h1>Registration</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="username" id="username-label">Username: </label>
                <input type="text" name="username" id="username" placeholder="type a username" required>

                <label for="fullname" id="fullname-label">Forname and lastname: </label>
                <input type="text" name="fullname" id="fullname" placeholder="Type forname and lastname">

                <label for="email" id="email-label">Email: </label>
                <input type="email" name="email" id="email" placeholder="type email" required>

                <label for="password" id="password-label">Password: </label>
                <input type="password" name="password" id="password" placeholder="Type password" required>
                <br>
                <span>Confirm password: </span> <span id="message"><i>Type to see if it matches</i></span>
                <label>Confirm password</label>
                <input type="password" name="password_confirm" id="password_confirm" placeholder="Repeat password">

                <br>
                <input type="submit" class="registerbtn" name="registerbtn" value="Register"></input>

                <p>
                    Already registered? <a href="front_page.php">Go to signin page</a>
                </p>
            </div>

        </form>
        <?php

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $usercontrol = new UserController();
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $cpassword = filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_STRING);

        // https://board.phpbuilder.com/d/10375596-dont-reset-php-form-fields

        if (isset($_POST['registerbtn'])) {
            if ($password != $cpassword) {
                die('Password did not match');
            }

            if ($usercontrol->checkIfUserExists($username, $email) == false) {
                echo "<div id='contents'>" . "User with " . $username . " and " . $email . " has already been created" . "</br> " . "</div>";

                exit();
            } else {
                $usercontrol->insertUser($username, $fullname, $email, $password);
                echo "<div id='contents'>" . "User with " . $username . " and " . $email . " created successfully" . "</br> " . "</div>";
            }
        }
        ?>
    </div>
</body>

<footer>
    <!--<p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>-->
</footer>

</html>
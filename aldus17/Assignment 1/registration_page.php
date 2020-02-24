<?php
require_once('dbconfig/config.php');

?>
<!DOCTYPE html>

<header>
    <title>Registration page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/formCheck.js"></script>
    <link rel="stylesheet" href="css/registration_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</header>

<body>
    <div class="register_form_wrapper">
        <form method="post" action="registration_page.php" onsubmit="event.preventDefault(); checkForm()">
            <div class="inner_register_form_container" id="inner-register-form-container">

                <h1>Registration</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <div class="input_username">
                    <label for="username" id="username-label">Username: </label>
                    <input type="text" name="username" id="username" placeholder="type a username">
                </div>

                <div class="input_fullname">
                    <label for="fullname" id="fullname-label">Forname and lastname: </label>
                    <input type="text" name="fullname" id="fullname" placeholder="Type forname and lastname">
                </div>

                <div class="input_email">
                    <label for="email" id="email-label">Email: </label>
                    <input type="email" name="email" id="email" placeholder="type email">
                </div>

                <div class="input_phone">
                    <label for="phone" id="phone-label">Phone number: </label>
                    <input type="tel" name="phone" id="phone" placeholder="type phone number">
                </div>

                <div class="input_password">
                    <label for="password" id="password-label">Password: </label>
                    <input type="password" name="password" id="password" placeholder="Type password">
                </div>

                <div class="input_cPassword">
                    <label>Confirm password</label>
                    <input type="password" name="password_confirm" placeholder="Repeat password">
                </div>

                <div class="input_register_button">
                    <button type="submit" class="register_button" name="reg_user">Register</button>
                </div>
                <p>
                    Already registered? <a href="front_page.php">Go to signin page</a>
                </p>
            </div>

        </form>
    </div>

</body>

<footer>
    <!--<p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>-->
</footer>
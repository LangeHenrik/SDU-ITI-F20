<?php
require_once('dbconfig/config.php');

?>
<!DOCTYPE html>

<header>
    <title>Frontpage</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/formCheck.js"></script>
    <link rel="stylesheet" href="css/registration_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</header>

<body>
    <form method="post" action="registration_page.php" onsubmit="event.preventDefault(); checkForm()">
        <div class="inner_register_form_container">
            <h1>Registration</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>

            <div class="input_username">
                <label>Username: </label>
                <input type="text" name="username" placeholder="type a username">
            </div>

            <div class="input_forname_lastname">
                <label for="for_and_last_name" id="for-and-last-name-label">Forname and lastname: </label>
                <input type="text" name="for_and_last_name" id="for-and-last-name" placeholder="Type forname and lastname">
            </div>

            <div class="input_email">
                <label for="email" id="email-label">Email: </label>
                <input type="email" name="email" placeholder="type email">
            </div>

            <div class="input_phone">
                <label for="phone" id="phone-label">Phone number: </label>
                <input type="phone" name="phone" placeholder="type phone number">
            </div>

            <div class="input_password">
                <label for="password" id="password-label">Password: </label>
                <input type="password" name="password">
            </div>

            <div class="input_cPassword">
                <label>Confirm password</label>
                <input type="password" name="password_confirm">
            </div>

            <div class="input_register_button">
                <button type="submit" class="register_button" name="reg_user">Register</button>
            </div>

        </div>
        <p>
            Already a registered? <a href="front_page.php">Go to sign in page</a>
        </p>
    </form>

</body>

<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>
<!DOCTYPE html>

<header>
    <title>Registration</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/formCheck.js"></script>
    <link rel="stylesheet" href="css/registration_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">

</header>

<body>
    <div class="register_form_wrapper">
        <form method="post" onsubmit="return checkForm(); return validatePassword();" oninput="return checkForm()">
            <div class="inner_register_form_container" id="inner-register-form-container">

                <h1>Registration</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="username" id="username-label">Username: </label>
                <input type="text" name="username" id="username" placeholder="type a username" required>

                <label for="fullname" id="fullname-label">Forname and lastname: </label>
                <input type="text" name="fullname" id="fullname" title="Please enter your first and lastname" pattern="^(\w+\s+\D).+$" placeholder="Type forname and lastname" required>

                <label for="email" id="email-label">Email: </label>
                <input type="email" name="email" id="email" placeholder="type email" required>
                
                <label for="password" id="password-label">Password: </label>
                <input type="password" name="password" id="password" placeholder="Type password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}" required>
                <br>
                
                <span>Confirm password: </span> <span id="message"><i>Type to see if it matches</i></span>
                
                <label>Confirm password</label>
                <input type="password" name="password_confirm" id="password_confirm" placeholder="Repeat password" oninput="return validatePassword();" onchange="return validatePassword();" required>
                <br>
                <input type="submit" class="registerbtn" name="registerbtn" value="Register"></input>

                <p>
                    Already registered? <a href="/aldus17/mvc/public/home/">Go to signin page</a>
                </p>
            </div>

            <?php
            
            ?>
        </form>
    </div>
</body>

</html>
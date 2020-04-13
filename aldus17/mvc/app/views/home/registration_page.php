<!DOCTYPE html>

<header>
    <title>Registration</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/registration_page_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <html lang="en">

</header>

<body class="registerBody" id="registerBody" name="registerBody">

    <div class="register_form_wrapper">
        <form method="post" action="/aldus17/mvc/public/home/register" id="registerForm" onsubmit="return checkForm();return false; return validatePassword();" oninput="return checkForm()">
            <div class="inner_register_form_container" id="inner-register-form-container">

                <h1>Registration</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <div class="form-group">
                    <label for="username" id="username-label">Username: </label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="type a username" required>
                </div>
                <div class="form-group">
                    <label for="fullname" id="fullname-label">Forname and lastname: </label>
                    <input type="text" class="form-control" name="fullname" id="fullname" title="Please enter your first and lastname" pattern="^(\w+\s+\D).+$" placeholder="Type forname and lastname" required>
                </div>
                <div class="form-group">
                    <label for="email" id="email-label">Email: </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="type email" required>
                </div>
                <div class="form-group">
                    <label for="password" id="password-label">Password: </label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Type password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{8,}" required>
                </div>
                <span>Confirm password: </span> <span id="message"><i>Type to see if it matches</i></span>
                <div class="form-group">
                    <label for="password_confirm" id="password_confirm-label">Confirm password</label>
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Repeat password" oninput="return validatePassword();" onchange="return validatePassword();" required>
                    <br>
                </div>
                <button type="submit" name="registerbtn" id="registerbtn" class="btn btn-primary btn-lg">Create Account</button>
                <!-- <input type="submit" class="registerbtn" name="registerbtn" value="Create Account"></input> -->

                <p>
                    Already registered? <a href="/aldus17/mvc/public/home/">Go to signin page</a>
                </p>
            </div>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../js/formCheck.js"></script>


</body>

</html>
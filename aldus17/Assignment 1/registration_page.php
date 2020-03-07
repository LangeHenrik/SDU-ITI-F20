<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');
?>
<?php
UserController::checkSession();
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
                    Already registered? <a href="index.php">Go to signin page</a>
                </p>
            </div>

            <?php
            $usercontrol = new UserController();
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $cpassword = filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_STRING);
            $errors = array();

            if (isset($_POST['registerbtn'])) {
                if ($password != $cpassword) {
                    echo "<div id='messageWarningsmall'>" .
                        "Password did not match" .
                        "</br> " .
                        "</div>";
                    exit();
                }
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);
                if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                    echo "<div id='messageWarningsmall'>" .
                        "Password should be at least 8 characters in length and should include at least one upper case letter and one number" .
                        "</br> " .
                        "</div>";
                    exit();
                }

                $regexCheckUsername = preg_match('/^([A-Za-z0-9]){4,20}$/', $username);
                if (empty($username) || !$regexCheckUsername) {
                    echo "<div id='messageWarning'>" .
                        "You entered username: <b>" .
                        $username . "</b> " . "<br>  ERROR - " .
                        "Username is empty or username is not between 4-20 characters long, only numbers and letters, no special characters" .
                        "</br> " .
                        "</div>";
                    exit();
                }

                $regexCheckFullname = preg_match('/(^(\w+\s+\D).+$)/', $fullname);
                if (empty($fullname) || !$regexCheckFullname) {
                    echo "<div id='messageWarning'>" .
                        "You entered fullname: <b>" .
                        $fullname . "</b> " . "<br>  ERROR - " .
                        "The fullname is either empty or fullname must contain first and lastname, no numbers allowed" .
                        "</br> " .
                        "</div>";
                    exit();
                }

                $regexCheckEmail = preg_match('/(\b[\w\.-]+@[\w\.-]+\.\w{2,26}\b)/', $email);
                if (empty($email) || !$regexCheckEmail) {
                    echo "<div id='messageWarning'>" .
                        "You entered email: <b>" .
                        $email . "</b> " . "<br>  ERROR - " .
                        "Email is either empty or email must contain a @ and a . afterwards, e.g. test@test.com" .
                        "</br> " .
                        "</div>";
                    exit();
                }

                if ($usercontrol->checkIfUserExists($username) == true) {
                    echo "<div id='messageWarningsmall'>" .
                        "User with username " .
                        $username .
                        " has already been created" .
                        "</br> " .
                        "</div>";
                    exit();
                } else {
                    $usercontrol->insertUser($username, $fullname, $email, $password);
                    echo "<div id='messageSuccess'>" .
                        "User with " .
                        $username .
                        " and " .
                        $email .
                        " created successfully" .
                        "</br> " .
                        "</div>";
                }
            }
            ?>
        </form>
    </div>
</body>

</html>
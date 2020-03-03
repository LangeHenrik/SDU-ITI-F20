<?php

require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');

UserController::checkSession();
?>
<!DOCTYPE html>

<header>
    <title>login / frontpage</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/loginAjax.js"></script>
    <link rel="stylesheet" href="css/index_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">

</header>

<body>
    <div id="main-wrapper">
        <form method="post" id="loginForm">
            <div class="inner_login_form_container">
                <h1>Login page</h1>
                <label>Username: </label>
                <input type="text" name='username' id='username' placeholder='Type username' />

                <label>Password: </label>
                <input name='password' id="password" type='password' placeholder='Type password' />
                <input type='submit' name='loginbtn' class="loginbtn" id="loginbtn" value='login' />
                <button name="registerReferBtn" class="registerReferBtn" id="registerReferBtn">Register</button>
            </div>
        </form>

        <?php

        if (isset($_POST['loginbtn'])) {

            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            $usercontrol = new UserController();

            if ($usercontrol->validateUserForLogin($username, $password) == true) {

                //HTTP::redirect("index.php");
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username;
                header("Location: front_page.php");
                echo 'Success login';
            } else {
                //HTTP::redirect("front_page.php");
                $_SESSION['message'] = "Incorrect Username or Password.";
                $_SESSION['logged_in'] = false;

                echo "<div id='messageWarning'><p>" . "Username or password is wrong" . "</p></br> " . "</div>";
                exit();
            }
        }

        if (isset($_POST['registerReferBtn'])) {
            header("Location: registration_page.php");
        }
        ?>

    </div>
</body>
</html>
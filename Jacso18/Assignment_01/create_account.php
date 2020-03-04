<?php
include 'includes/autoload.php';


    
$message="";
$username = $password = $email ="";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $userController = new UserController();
    if ($userController->userExists($username) == false) {
        $userController->createUser($username, $email, password_hash($password, PASSWORD_DEFAULT));
        $message= 'Account has been created';
    } else {
        $message= 'Username has already been used';
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="/javascript/javascript.js"></script>
    <link rel="stylesheet" type="text/css" href="/CSS/stylesheet.css">
    <html lang="en">
</head>

<body>
    <div class="div-form">
        <form class="form" onblur="" onsubmit="return checkform();" method="POST">
            <div class="field-name">
                <i class="fas fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Username" onkeyup="checkname()" onchange="checkname()" onblur="checkname()" />
            </div>
            <div class="field-password">
                <i class="fas fa-key"></i>
                <input type="password" name="password" id="password" placeholder="Password" onkeyup="checkpassword()" onchange="checkpassword()" onblur="checkpassword()" />
            </div>
            <div class="field-email">
                <i class="fas fa-envelope"></i>
                <input type="text" name="email" id="email" placeholder="Email" onkeyup="checkMail()" onchange="checkMail()" onblur="checkMail()" />
            </div>
            <div class="button-submit">
                <input type="submit" name="submit" id="submit" value="Create" />
            </div>
            <div class="link-index">
                <a href="index.php">back</a>
            </div>
            <div class="form-response">
                <p><?php echo $message;?></p>
            </div>
        </form>
    </div>

</body>

</html>
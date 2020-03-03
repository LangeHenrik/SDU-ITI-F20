<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ITI assignment 1</title>
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
//require_once 'db_config.php';

$correct_username = "joe";
$correct_password = "pass";

$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($username === $correct_username
    && $password === $correct_password) {
    $_SESSION['logged_in'] = true;
    echo 'logged in!';
} else {
    $_SESSION['logged_in'] = false;
    echo 'wrong username or password';
}

if ($_SESSION['logged_in']) : ?>


<?php else : ?>
<div class="grid-container">
    <div class="login1">
        <h1><?php echo 'Log in or sign up via the Registration button' ?></h1>
    </div>
    <div class="login2">
        <!-- Login -->
        <form action="welcome.php" method="post" onsubmit="return checkLogin('username', 'password')">
            <p>username: <input type="text" name="username" required id="usernameId"></p><br>
            <p>password: <input type="password" name="password" required id="passwordId"></p><br>
            <input type="submit">
    </div>
    <div class="login3">
        <button><input type="submit" name="send" value="Login"></button>
    </div>
    </form>
    <div class="login4">
        <button><input action="register.php" type="button" name="register" value="Register" id="register"></button>
    </div>

    <div class="register" id="registerView">
        <form action="index.php" method="post" onsubmit="return checkRegister('username', 'password', 'email'" )>
            <p> username: <input type="text" name="username" required id="regUsernameId"></p><br>
            <p> password: <input type="password" name="password" required id="regPassId"></p><br>
            <p> email: <input type="email" name="email" required id="regEmailId"></p><br>
            <input type="submit">
        </form>
    </div>

</div>
<?php // require("migration.sql");

if (session_status() == PHP_SESSION_NONE) {
    session_start();

}
$config = require("db_config.php");
$host = $config["host"];
$username = $config["username"];
$password = $config["password"];
$db = $config["db"];
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $conn = new PDO($dsn, $username, $password, $options);
    // set the PDO error mode to exception

    echo "DB Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<?php endif; ?>
<?php
function checkRegister()
{

    try {

        $stmt = $conn->prepare("INSERT INTO users (username, password, email)
			VALUES ($username, $password, $email)");
        // use exec() because no results are returned
        $stmt->exec([$new_user, $hashed_pass]);
        return "New record created successfully";
    } catch (PDOException $e) {
        echo "ERROR" . $e->getMessage();
    }

    $conn = null;
}

?>
<script src="scripts/scripts.js"></script>
</body>
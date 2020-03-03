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

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$host = "localhost";
$username = "root";
$password = "root";

$db = "jakaa18_jesha18";
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

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $stmt = $conn->prepare('SELECT username, password FROM users WHERE username=:username');
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    $correct_username = $user["username"];
    $correct_password = $user["password"];
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    if ($username === $correct_username
        && password_verify($password, $correct_password)) {
        $_SESSION['logged_in'] = true;
        echo 'logged in!';
    } else {
        $_SESSION['logged_in'] = false;
        echo 'wrong username or password';
    }

} else {
    $_SESSION['logged_in'] = false;
}

if ($_SESSION['logged_in']) : ?>
<div class="grid-container">
    <div class="Header">
        <h1><?php echo 'Welcome to your homepage!' ?></h1>
    </div>
    <div class="homepage">
        <ul>
            <li><a href="default.asp">Home</a></li>
            <li><a href="photos.asp">Your Photos</a></li>
            <li><a href="users.asp">Users</a></li>
            <li><a href="logout.asp">Logout</a></li>
        </ul>
    </div>
</div>

<?php else : ?>

<div class="grid-container">
    <div class="login1">
        <h1><?php echo 'Log in or sign up via the Registration button' ?></h1>
    </div>
    <div class="login2" id="loginView">
        <!-- Login -->
        <form method="post" onsubmit="return checkLogin()">
            <p>username: <input type="text" name="username" id="usernameId"></p><br>
            <p>password: <input type="password" name="password" id="passwordId"></p><br>

    </div>
    <div class="login3">
        <button><input type="submit" name="send" value="Login" id="loginBtn"></button>
    </div>
    </form>

    <div class="login4">
        <button><input action="register.php" type="button" name="register" value="Register" id="register"></button>
    </div>

    <div class="register" id="registerView">
        <form action="index.php" method="post" onsubmit="return checkRegister('username', 'password', 'email'" )>
            <p> username: <input type="text" placeholder="Enter Username" name="regUsernameId" id="regUsernameId" required ></p><br>
            <p> password: <input type="password" placeholder="Enter Password" name="regPassId" id="regPassId" required></p><br>

            <input type="submit">
        </form>
    </div>
</div>

<?php


    try {
        if (isset($_POST["regUsernameId"]) && isset($_POST["regPassId"])) {
            $stmt = $conn->prepare("INSERT INTO users (username, password)
			VALUES (:username, :password)");
            $new_user = htmlentities($_POST["regUsernameId"]);
            $new_pass = htmlentities($_POST["regPassId"]);
            $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
            $stmt->execute(['username' => $new_user, 'password' => $hashed_pass]);
            //$user = $stmt->fetch();
            echo "New user created";
            //return "New record created successfully";
        }
    }
    catch
        (PDOException $e) {
            echo "ERROR" . $e->getMessage();
        }

    $conn = null;


?>
<script src="scripts/scripts.js"></script>
<?php endif; ?>
</body>
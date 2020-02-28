<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>

<?php
$config = require('db_config.php');
$host = $config["host"];
$db = $config["db"];
$user = $config["user"];
$pass = $config["pass"];

$dsn = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$correct_username = "john";
$correct_password = "1234";

$username = htmlentities($_POST["username"] ?? "");
$password = htmlentities($_POST["password"] ?? "");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($username == $correct_username && $password == $correct_password) {
    $_SESSION["logged_in"] = true;
} else {
    $_SESSION["logged_in"] = false;
}

if ($_SESSION["logged_in"]) :
    ?>
    <div class="grid-container">
        <div class="header" name="title" id="title">Image feed</div>
        <div class="menu">
            <button class="menuButton" name="imagesButton" id="imagesButton">Images</button>
            <button class="menuButton" name="usersButton" id="usersButton">Users</button>
            <button class="menuButton" name="uploadButton" id="uploadButton">Upload</button>
            <form name="logOut" id="logOut" method="post">
                <button class="menuButton" value="Log out" type="submit">Log out :'(</button>
            </form>
        </div>
        <div class="main">
            <div class="content" name="imageFeed" id="imageFeed">Images</div>
            <div class="content" name="users" id="users">Users</div>
            <div class="content" name="upload" id="upload">Upload</div>
        </div>
        <div class="footer">2020</div>
    </div>
<?php else : ?>
    <!-- Login -->
    <div class="wrapper">
        <div id="loginForm" name="loginForm">
            <form id="login" name="login" method="post">
                <label for="username">Username</label>
                <br/>
                <input type="text" placeholder="Enter username" name="username" id="username" onfocusout="checkName('username', 'wrongInfo')" required/>
                <br/>
                <br/>
                <label for="password">Password</label>
                <br/>
                <input type="password" placeholder="Enter password" name="password" id="password" onfocusout="checkPass('password', 'wrongInfo')" required/>
                <br/>
                <button value="Login" type="submit">Login</button>
                <br/>
                <button id="registerButton">Sign Up</button>
            </form>
        </div>
        <!-- Sign up modal -->
        <div id="modalForm" class="modal">
            <span id="closeModal" id="closeModal" title="Close Modal">&times;</span>
            <form class="modal-content" onsubmit="return checkFields()" method="post">
                <div class="container">
                    <h1>Sign up here!</h1>
                    <hr>
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter username" name="regUsername" id="regUsername" onfocusout="checkName('regUsername', 'invalidRegName')" required/>
                    <div class="inputInfo"
                        <label id="invalidRegName"></label>
                    </div>
                    <br/>
                    <label for="regPassword"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="regPassword" id="regPassword" onfocusout="checkPass('regPassword', 'invalidRegPass')" required/>
                    <label for="regPasswordRepeat"><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="regPasswordRepeat" id="reqPasswordRepeat" required/>
                    <div class="inputInfo">
                        <label class="inputInfo" id="invalidRegPass"></label>
                    </div>
                    <div class="clearfix">
                        <button type="button" name="cancelButton" id="cancelButton" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="inputInfo" id="wrongInfoDiv"><label name="wrongInfo" id="wrongInfo"></label></div>
<?php endif; ?>
<script src="js/index.js"></script>
</body>
</html>

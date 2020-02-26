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
$correct_username = "john";
$correct_password = "1234";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

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
    <div id="loginForm" name="loginForm">
        <form id="login" name="login" method="post">
            <label for="username">Username</label>
            <br/>
            <input type="text" placeholder="Enter username" name="username" id="username" required/>
            <br/>
            <label for="password">Password</label>
            <br/>
            <input type="password" placeholder="Enter password" name="password" id="password" required/>
            <br/>
            <button value="Login" type="submit">Login</button>
            <br/>
            <label name="wrongInfo" id="wrongInfo"></label>
        </form>
        <button id="registerButton">Sign Up</button>
    </div>
<?php endif; ?>
</body>
</html>

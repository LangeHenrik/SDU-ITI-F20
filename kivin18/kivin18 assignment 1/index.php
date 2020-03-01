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
require("db_connection.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $_SESSION["logged_in"] = false;
}

// Login
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = htmlentities($_POST["username"]);
    $password = htmlentities($_POST["password"]);
    $stmt = $pdo->prepare('SELECT username, pw_hash FROM user WHERE username LIKE ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($username == $user['username'] && password_verify($password, $user['pw_hash'])) {
        $_SESSION["logged_in"] = true;
    }
}

if ($_SESSION["logged_in"]) :
    ?>
    <!-- Main content -->
    <div class="grid-container">
        <div class="header" name="title" id="title">Image feed</div>
        <div class="menu">
            <button class="menuButton" name="imagesButton" id="imagesButton">Images</button>
            <button class="menuButton" name="usersButton" id="usersButton" type="submit">Users</button>
            <button class="menuButton" name="uploadButton" id="uploadButton">Upload</button>
            <button class="menuButton" id="logoutButton" value="Log out">Log out :'(</button>
        </div>
        <div class="main">
            <div class="content" name="imageFeed" id="imageFeed">Images</div>
            <div class="content" name="users" id="users">
                <ul id="userList">
                </ul>
            </div>
            <div class="content" name="upload" id="upload">Upload</div>
        </div>
        <div class="footer">2020</div>
    </div>
<?php else : ?>
    <!-- Login -->
    <div class="wrapper">
        <div id="loginForm" name="loginForm">
            <form id="login" name="login" onsubmit="return checkLoginFields()" method="post">
                <label for="username">Username</label>
                <br/>
                <input type="text" placeholder="Enter username" name="username" id="username" onfocusout="checkName('username', 'wrongInfo')"/>
                <br/>
                <br/>
                <label for="password">Password</label>
                <br/>
                <input type="password" placeholder="Enter password" name="password" id="password" onfocusout="checkPass('password', 'wrongInfo')"/>
                <br/>
                <button value="Login" type="submit">Login</button>
                <br/>
                <button id="registerButton">Sign Up</button>
            </form>
        </div>
        <!-- Sign up modal -->
        <div id="modalForm" class="modal">
            <span id="closeModal" id="closeModal" title="Close Modal">&times;</span>
            <form class="modal-content" onsubmit="return checkRegisterFields()" method="post">
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
                    <input type="password" placeholder="Repeat Password" name="regPasswordRepeat" id="regPasswordRepeat" onfocusout="confirmPass()" required/>
                    <div class="inputInfo">
                        <label class="inputInfo" id="invalidRegPass"></label>
                    </div>
                    <br>
                    <div class="clearfix">
                        <button type="button" name="cancelButton" id="cancelButton" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    <?php
    //Sign up
    if (isset($_POST["regUsername"]) && isset($_POST["regPassword"])) {
        $stmt = $pdo->prepare('INSERT INTO user(username, pw_hash, join_date) VALUES (?, ?, NOW())');
        $new_user = htmlentities($_POST["regUsername"]);
        $new_pass = htmlentities($_POST["regPassword"]);
        $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
        $stmt->execute([$new_user, $hashed_pass]);
    }
    ?>
    </div>
    <div class="inputInfo" id="wrongInfoDiv"><label name="wrongInfo" id="wrongInfo"></label></div>
<?php endif; ?>
<script src="js/index.js"></script>
</body>
</html>

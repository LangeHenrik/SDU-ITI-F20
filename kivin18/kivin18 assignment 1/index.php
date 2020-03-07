<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Image Feed</title>
</head>
<body>

<?php
require("db_connection.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
        $_SESSION['user'] = $user['username'];
    } else {
        echo "<p>", "Wrong username or password!", "</p>";
    }
}

if ($_SESSION["logged_in"] ?? false) :
    ?>
    <!-- Logged in content -->
    <div class="grid-container">
        <div class="header" id="title"><h2>Image Feed</h2></div>
        <div class="menu">
            <button class="menuButton" name="imagesButton" id="imagesButton">Images</button>
            <button class="menuButton" name="usersButton" id="usersButton" type="submit">Users</button>
            <button class="menuButton" name="uploadButton" id="uploadButton">Upload</button>
            <button class="menuButton" id="logoutButton" value="Log out">Log out :'(</button>
        </div>
        <div class="main">
            <!-- Image feed -->
            <div class="content" id="imageFeed">Welcome!</div>
            <!-- Users -->
            <div class="content" id="users">
                <h3>Users</h3>
                <ul id="userList">
                </ul>
            </div>
            <!-- Upload form-->
            <div class="content" id="upload">
                <form id="uploadForm" method="post" enctype="multipart/form-data">
                    <h3>Select image to upload:</h3>
                    <label for="imageHeader">Title</label>
                    <br/>
                    <input type="text" maxlength="50" name="imageHeader" id="imageHeader">
                    <br/>
                    <label for="description">Description</label>
                    <br/><br/>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    <br/><br/>
                    <label class="button" for="image">Choose image</label>
                    <input class="fileInput " type="file" name="image" id="image">
                    <br/>
                </form>
                <br/>
                <button class="button" name="uploadImageButton" id="uploadImageButton">Upload image</button>
                <br/>
                <label id="uploadInfo"></label>
            </div>
        </div>
        <div class="footer">2020</div>
    </div>
<?php else : ?>
    <!-- Login -->
    <div class="wrapper">
        <div id="loginForm">
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
            <span id="closeModal" title="Close Modal">&times;</span>
            <form class="modal-content" onsubmit="return checkRegisterFields()" method="post">
                <div class="container">
                    <h1>Sign up here!</h1>
                    <hr>
                    <label for="regUsername"><b>Username</b></label>
                    <input type="text" placeholder="Enter username" name="regUsername" id="regUsername" onfocusout="checkName('regUsername', 'invalidRegName')" required/>
                    <div class="inputInfo">
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
                    <br/>
                    <div class="clearfix">
                        <button type="button" name="cancelButton" id="cancelButton" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
                </div>
            </form>
        </div>
    <?php
    //Sign up
    try {
        if (isset($_POST["regUsername"]) && isset($_POST["regPassword"])) {
            $stmt = $pdo->prepare('INSERT INTO user(username, pw_hash) VALUES (?, ?)');
            $new_user = htmlentities($_POST["regUsername"]);
            $new_pass = htmlentities($_POST["regPassword"]);
            if (preg_match("/^\S\w{5,50}$/", $new_user) && preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/", $new_pass)) {
                $hashed_pass = password_hash($new_pass, PASSWORD_DEFAULT);
                $stmt->execute([$new_user, $hashed_pass]);
            }
        }
    } catch (PDOException $exception) {
        $duplicate = "Integrity constraint violation: 1062 Duplicate entry";
        if (strpos($exception->getMessage(), $duplicate) !== FALSE) {
            echo "<p>", "Sign up failed. User already exists. Try again!", "</p>";
        } else {
            throw $exception;
        }
    }
    ?>
    </div>
    <div class="inputInfo" id="wrongInfoDiv"><label id="wrongInfo"></label></div>
<?php endif; ?>
<script src="js/index.js"></script>
</body>
</html>

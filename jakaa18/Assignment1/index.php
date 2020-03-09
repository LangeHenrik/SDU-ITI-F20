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
$dbusername = "root";
$dbpassword = "root";

$db = "jakaa18_jesha18";
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $conn = new PDO($dsn, $dbusername, $dbpassword, $options);
    // set the PDO error mode to exception

    echo "DB Connected successfully \n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

//----------------------------------------------------------------
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username =?");
    $stmt->execute(array($username));
    $user = $stmt->fetch(PDO::FETCH_BOTH);
    $correct_username = filter_var($user["username"],FILTER_SANITIZE_STRING);
    $correct_password = filter_var($user["password"],FILTER_SANITIZE_STRING);

    if ($correct_username === $username
        && password_verify($password, $correct_password)) {
        $_SESSION['logged_in'] = true;
        echo 'logged in!';
    } else {
        $_SESSION['logged_in'] = false;
        echo 'wrong username or password';
    }
//---------------------------------------------------------------------
} else {
    $_SESSION['logged_in'] = false;
    echo 'logged out';
}


//This section is the main page.
if ($_SESSION['logged_in']) : ?>

    <div class="grid-container2">
        <div class="header">
            <h1><?php echo 'Welcome to your homepage!' ?></h1>
        </div>
        <div class="homepage1">
            <ul>
                <li><a onclick="showHomeLink()" href="#" id="homelink">Home</a></li>
                <li><a onclick="showPhotoLink()" href="#" id="photolink">Upload Photos</a></li>
                <li><a onclick="showUsersLink()" href="#" id="userslink">Users</a></li>
                <li><a href="logout.php" id="logout">Logout</a></li>
            </ul>
        </div>
		<div class="homepage2" id="uploadForm">
			<form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload
                <input type="file" name="image" id="fileId">
                <input type="submit" name="imgSubmit" value="Upload" id="imgSubmit">
                <p> Header: <input type ="text" name="header" id="header" required></p><br>
                <label for="description">Image description: Max 300 characters!</label><br>
                <textarea id="description" id="descriptionId" rows="4" cols="50" required></textarea>
            </form>
		</div>
		<div class="homepage2" name="Image_page" id="imagePage">
			<!-- Okay, so, first we go onto this part of the page.
			Then we ask the database how many images exist in the database. (???)
			Then we ask to get all images with every part of each tuple, possibly through AJAX.
			Then we order them on the page.
			Then we unload all of this once we click off???
			-->
			<form action="download.php" method="get" enctype?"multipart/form-data">
				
			
			<!-- AJAX format:
			"ajax": {
                url: "http://localhost:8080/" +document.getElementById("pic_id").innerHTML + "/get-image",
                dataSrc: 'pictures'
            },
			"image": [
                { "data": "pic_id" },
                { "data": "header" },
                { "data": "description" },
                { "data": "user" },
                { "data": "picture" }
            ]-->
				<div class="image-container">
					<text> 
					<div class="container1>
						<text "Title"> hej</text>
						<img class=images src="https://images.unsplash.com/photo-1523895665936-7bfe172b757d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="Snow" style="width:100%">
						<text "Description"> "Blob" </text>
						<text "Author"> <i>By: Mig</i> </text>
					</div>
					<div class="container1>
						<text "Title"> hej</text>
						<img class=images src="https://images.unsplash.com/photo-1523895665936-7bfe172b757d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="Snow" style="width:100%">
						<text "Description"> "Blob" </text>
						<text "Author"> <i>By: Mig</i> </text>
					</div>
				</div>
			</form>
		</div>
	</div>

	
<!-- This section is the login page-->
<?php else : ?>

    <div class="grid-container">
        <div class="login1">
            <h1><?php echo 'Log in or sign up via the Registration button' ?></h1>
        </div>
        <div class="login2" id="loginView">
            <!-- Login -->
            <form method="post">
                <p> Username: <input type="text" name="username" id="usernameId"></p><br>
                <p> Password: <input type="password" name="password" id="passwordId"></p><br>

        </div>
        <div class="login3">
            <input type="submit" class="button" name="send" value="Login" id="loginBtn">
        </div>
        </form>

        <div class="login4">
            <input action="register.php" class="button" type="button" name="register" value="Register" id="register">
        </div>

        <div class="register1" id="registerView">
            <form action="index.php" method="post" onsubmit="return checkRegister('username', 'password'" )>
                <p> Username: (Max 100 chars)<input type="text" placeholder="Enter Username" name="regUsernameId" id="regUsernameId"
                                     required></p><br>
                <p> Password: (Max 100 chars) <input type="password" placeholder="Enter Password" name="regPassId" id="regPassId"
                                     required></p><br>

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
} catch
(PDOException $e) {
    echo "ERROR" . $e->getMessage();
}


?>
    <script src="scripts/scripts.js"></script>
<?php endif; ?>
</body>
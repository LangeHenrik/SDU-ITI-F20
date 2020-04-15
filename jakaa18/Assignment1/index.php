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
require_once 'db_connect.php';

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
        $_SESSION['sessionUser'] = $correct_username;
    } else {
        $_SESSION['logged_in'] = false;
        echo 'wrong username or password';
    }
//---------------------------------------------------------------------s
} else {
    $_SESSION['logged_in'] = false;
    echo 'logged out';
}


//This section is the main page.
if ($_SESSION['logged_in']) : ?>
    <div class="grid-container2">
	<body onload="showHomeLink()">
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
                <textarea name="imgDescription" id="description" id="descriptionId" rows="4" cols="50" required></textarea>
            </form>
		</div>
		<div class="homepage2" name="Image_page" id="imagePage">
			<div class="image-container">
				<?php
				$grab = $conn->query("SELECT header, description, user, picture FROM pictures ORDER BY pic_id DESC");
					foreach ($grab as $pictures){
						print '<div class="container1">';
						print $pictures['user'].'</br><h2>'. $pictures['header'] .'</h2></br>';
						print '<img class="images" src="data:image/;base64,' . base64_encode( $pictures['picture'] ) . '" >';
						print '</br>'.$pictures['description'].'</br>';
						print '</div>';
					}
				?>
			</div>
		</div>
        <div class="homepage4" name="usersPage" id="usersPage">
            <table name="usersTable" id="usersTable">
                <tr>
                    <th>All Users</th>
                </tr>
                <?php

                $fetch = $conn->prepare("SELECT username FROM users");
                $fetch->execute();
                foreach ($fetch as $tuple) {
                    echo '<tr><td>' . $tuple['username'].'</td></tr>';
                }
                ?>
            </table>
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
            <text id="usernameAvailable" name="usernameAvailable"></text><br>
            <form action="index.php" method="post">
                <p> Username: (Max 100 chars)<input type="text" placeholder="Enter Username" name="regUsernameId" id="regUsernameId"
                                     required onkeyup="checkUsername(this.value)" onkeydown="checkRegister()"></p><br>
                <p> Password: (Max 100 chars) <input type="password" placeholder="Enter Password" name="regPassId" id="regPassId"
                                     required></p><br>

                <input type="submit">
            </form>
        </div>
    </div>

<?php


try {
    if (isset($_POST["regUsernameId"]) && isset($_POST["regPassId"])) {
        $userRegEx = '/^[A-Za-zÆØÅæøå _\-\d]{3,}$/';

        if (isset($_GET["username"])){
            $user = filter_var($_GET["username"], FILTER_SANITIZE_STRING);
            $check = query("SELECT * FROM users WHERE username = ?;" ,[$user]);
            echo (count($check) === 0) ? $user." is available" : $user." is not available";
            
        }
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
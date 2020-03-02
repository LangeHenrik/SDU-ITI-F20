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
<h1><?php echo 'Log in or sign up via the Registration button' ?></h1>

<body>

	<!-- Login -->
	<form action="welcome.php" method="post" onsubmit="return checkLogin()">
		<p>username: <input type="text" name="username" id="usernameId"></p><br>
		<p>password: <input type="password" name="password" id="passwordId"></p><br>
		<button><input type="submit" name="send" value="Send"></button>
	</form>

	<button><input action="register.php" type="button" name="register" value="Register"></button>

	<?php
	// require("migration.sql");

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
		$_SESSION["logged_in"] = false;
	}



	?>

	
</body>
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
<div class="grid-container">
	<div class="login1">
		<h1><?php echo 'Log in or sign up via the Registration button' ?></h1>
	</div>
	<div class="login2">
		<!-- Login -->
		<form action="welcome.php" method="post" onsubmit="return checkLogin()">
			<p>username: <input type="text" name="username" required id="usernameId"></p><br>
			<p>password: <input type="password" name="password" required id="passwordId"></p><br>
			<input type ="submit">
	</div>
	<div class="login3">
			<button><input type="submit" name="send" value="Login"></button>
	</div>
		</form>
	<div class="login4">
		<button><input action="register.php" type="button" name="register" value="Register"></button>
	</div>
		<?php
		// require("migration.sql");

		if (session_status() == PHP_SESSION_NONE) {
			session_start();
			$_SESSION["logged_in"] = false;
		}
		$servername = "localhost";
		$username = "defaultuser";
		$password = "";

		try {
    		$conn = new PDO("mysql:host=$servername;dbname=jakaa18_jesha18", $username, $password);
    		// set the PDO error mode to exception
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    		echo "Connected successfully";
    	}
		catch(PDOException $e)
   		 {
    	echo "Connection failed: " . $e->getMessage();
    	}

		?>
	</div>
	
</body>
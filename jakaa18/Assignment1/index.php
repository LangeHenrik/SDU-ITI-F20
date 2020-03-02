<!DOCTYPE html>

<html lang="en">

<head>
	<style>
	h1 {text-align:center;}
	p {text-align:center;}
	</style>
    <meta charset="UTF-8">
    <title>ITI assignment 1</title>
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/scripts.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<h1><?php echo 'Log in or sign up via the Registration button' ?></h1>
<body>
<body bgcolor="LightBlue">
	
	
	<form action="login.php" method="post">
		<p>username: <input type="text" name="username"><br>
		password: <input type="password" name="password"></p><br>
		<button><input type="submit" name="send" value="Send" id="btn_s"></button>
	</form>

	<button><input type="button" name="register" value="Register" id="btn_y"></button>
	
	<?php
	require("migration/migration.sql");

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
		$_SESSION["logged_in"] = false;
	}
	
	?>
	
</body>
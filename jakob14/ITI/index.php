<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	
</head>
<body>
	<header>
	<?php 
require "assets/php/header.php" 
	 ?>
	 </header>
	 
	<style type="text/css">
		body{
			background: url(img/lock.png);
		}
	</style>
	
	<div class="loginbox">
		<img src="img/avatar.png" class="avatar" >
		<h1>Login</h1>
		<form action="signin.php" method="post">
			<p>Username </p>
			<input type="text" name="username" required placeholder="Enter Username">
			<p>Password</p>
			<input type="Password" name="password" required placeholder="Enter Password">
			<input type="submit" name="loginsubmit" value="Login">
			<a href="upload.php">Lost your password?</a> <br>
			<a href="register.php">No account?</a>
		</form>
	</div>
</body>
</html>
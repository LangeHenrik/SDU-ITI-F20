<?php 
require "db_config.php";
 ?>
<html>
<head>
	<title>Register User</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<body>
	<?php 
require "assets/php/header.php"
 ?>
	<style type="text/css">
		body{
			background: url(img/lock.png);
		}
	</style>
		<div class="regbox">
		<img src="img/avatar.png" class="avatar" >
		<h1>Register</h1>
		<form action="signup.php" method="post" onsubmit="return checkform();" >

			<p>Username</p>
			<input type="text" id="username" name="username" required placeholder="Enter Username">
			<p class="info" id="usernameinfo"></p>
			<p>Password</p>
			<input type="Password" id="password" name="password" required placeholder="Enter Password">
			<p class="info" id="passwordinfo"></p>
			<p>E-mail</p>
			<input type="email" id="email" name="email" required placeholder="Enter Email">
			<p class="info" id="emailinfo"></p>
			<input type="submit" name="signupsubmit" value="Create">
			<a href="index.php">Already have an account?</a>
		</form>
	</div>




	<script src="js/register.js"></script>

</body>
</html>
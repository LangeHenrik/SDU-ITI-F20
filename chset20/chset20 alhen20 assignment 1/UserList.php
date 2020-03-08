<?php
if(session_status()==PHP_SESSION_NONE){
	session_start();
	$_SESSION["logged_in"]=false;
}
?>
<html>

<head>
	<title>Front Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="navbar">
		<?php if($_SESSION["logged_in"]==true):?>
			<nav>
				<a href="index.php">Home</a>
				<a href="Picture.php">Pictures</a>
				<a href="UserList.php" class="active">Users</a>
				<a href="Upload.php">Upload</a>
			</nav>
		<?php else:?>
			<nav>
				<a href="index.php">Home</a>
				<a href="Register.php">Register</a>
			</nav>
			<div class="LoginForm">
				<form>
					<label for="username" >username</label>
					<input type="text" name="username" id="username"/>
					<label for="password">password</label>
					<input type="password" name="password" id="password"/>
					<input type="submit" name="submit" id="submit" value="Login"/>
				</form>
			</div>
		<?php endif;?>
	</div>

	<div class="container">
		<div class="content">
			<?php if($_SESSION["logged_in"]==true):?>
				<div class="user">
					<img src="profile1.jpg"/>
					<div class="name">Robert</div>
				</div>
				<div class="user">
					<img src="profile1.jpg"/>
					<div class="name">Robert</div>
				</div>
				<div class="user">
					<img src="profile1.jpg"/>
					<div class="name">Robert</div>
				</div>
				<div class="user">
					<img src="profile1.jpg"/>
					<div class="name">Robert</div>
				</div>
			<?php else:?>
				You cannot access this page when you're not logged in.
			<?php endif;?>
		</div>
	</div>
</body>
</html>

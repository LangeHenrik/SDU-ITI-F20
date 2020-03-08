<?php
if(session_status()==PHP_SESSION_NONE){
	session_start();
	if(!isset($_SESSION["logged_in"])) $_SESSION["logged_in"]=false;
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
				<a href="index.php" class="active">Home</a>
				<a href="Picture.php">Pictures</a>
				<a href="UserList.php">Users</a>
				<a href="Upload.php">Upload</a>
				<a href="logout.php">Logout</a>
			</nav>
		<?php else:?>
			<nav>
				<a href="index.php" class="active">Home</a>
				<a href="Register.html">Register</a>
			</nav>
			<div class="LoginForm">
				<form action="login.php" method="POST">
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
			<?php if($_SESSION["logged_in"]==true){
				echo "Hello ".$_SESSION["uname"]."!";
			}?>
			<div class="homepic">
				<img src="home.jfif"/>
			</div>
		</div>
	</div>
</body>
</html>

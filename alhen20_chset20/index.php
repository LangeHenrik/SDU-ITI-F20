<!DOCTYPE html>
<html>
<head>
	<title>Front Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
	<div class="navbar">
		<nav>
			<a href="index.php" class="active">Home</a>
			<a href="Picture.php">Pictures</a>
			<a href="UserList.php" >Users</a>
			<a href="Upload.php" >Upload</a>
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


	</div>
	<div class="container">
		<div class="content">
			<div class="homepic">
				<img src="home.jfif"/>
			</div>
		</div>
	</div>
</body>
</html>

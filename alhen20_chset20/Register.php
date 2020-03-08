<!DOCTYPE html>
<html>
<head>
	<title>Front Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
	<div class="navbar">
		<nav>
			<a href="index.php">Home</a>
			<a href="Picture.php">Pictures</a>
			<a href="UserList.php" >Users</a>
			<a href="Upload.php" >Upload</a>
			<a href="Register.php" class="active">Register</a>
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
			<div class="mainform">
				<form>
					<label for="username" >Username</label>
					<br>
					<input type="text" name="username" id="username"/>
					<br>
					<label for="username" >Email</label>
					<br>
					<input type="text" name="email" id="email"/>
					<br>
					<label for="password">Password</label>
					<br>
					<input type="password" name="password" id="password"/>
					<input type="submit" name="submit" id="submit" value="Register"/>
				</form>
			</div>

		</div>

	</div>
</body>
</html>

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
			<a href="Picture.php" class="active">Pictures</a>
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
			<div class="picture">
				<div class="header">header</div>
				<img src="profile1.jpg"/>
				<div class="description">Description Lorem ipsum ullamco aute ut ut in ad in eiusmod ut deserunt sit amet laborum ut incididunt ut et proident consequat proident excepteur minim aute consectetur dolor consequat magna est sed occaecat officia quis in labore fugiat ex ut nulla irure.</div>
			</div>
			<br>
			<div class="picture">
				<div class="header">header</div>
				<img src="profile1.jpg"/>
				<div class="description">Description Lorem ipsum ullamco aute ut ut in ad in eiusmod ut deserunt sit amet laborum ut incididunt ut et proident consequat proident excepteur minim aute consectetur dolor consequat magna est sed occaecat officia quis in labore fugiat ex ut nulla irure.</div>
			</div>
			<br>
			<div class="picture">
				<div class="header">header</div>
				<img src="profile1.jpg"/>
				<div class="description">Description Lorem ipsum ullamco aute ut ut in ad in eiusmod ut deserunt sit amet laborum ut incididunt ut et proident consequat proident excepteur minim aute consectetur dolor consequat magna est sed occaecat officia quis in labore fugiat ex ut nulla irure.</div>
			</div>
			<br>

		</div>
	</div>

</body>
</html>

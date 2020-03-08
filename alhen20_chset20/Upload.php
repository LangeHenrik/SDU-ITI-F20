<?php
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
require_once 'config.php';
try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",
		$username,
		$password,
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}
?>
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
			<a href="UserList.php">Users</a>
			<a href="Upload.php" class="active">Upload</a>
			<a href="logout.php">Logout</a>
		</nav>
	</div>

	<div class="container">
		<div class="content">
			<div class="mainform">
				<form action="process_upload.php" method="POST">
					<label for="header" >Header</label>
					<br>
					<input type="text" name="header" id="header"/>
					<br>
					<label for="password">Image</label>
					<br>
					<input type="file" name="image" id="image"/>
					<br>
					<label for="description" >Description</label>
					<br>
					<textarea name="description" id="desription" rows="4" cols="50"></textarea>
					<input type="submit" name="submit" id="submit" value="Upload"/>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

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
			<a href="UserList.php" class="active">Users</a>
			<a href="Upload.php">Upload</a>
			<a href="logout.php">Logout</a>
		</nav>
	</div>

	<div class="container">
		<div class="content">
			<div class="user">
				<img src="profile1.jpg"/>
				<div class="name">Template</div>
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
		</div>
	</div>
</body>
</html>

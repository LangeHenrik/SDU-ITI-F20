<?php
if(session_status()==PHP_SESSION_NONE){
	session_start();
}
if($_SESSION["logged_in"]==false){
	header("Location: index.php");
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
			<a href="Upload.html">Upload</a>
			<a href="logout.php">Logout</a>
		</nav>
	</div>

	<div class="container">
		<div class="content">
			<div class="user">
				<div class="mail">Template</div>
				<div class="name">Template</div>
			</div>
			<?php
			$stmt = $conn->prepare("SELECT username, email
				FROM site_user");
			$stmt->execute();
			$result = $stmt->fetchAll();

			foreach($result as $res):?>
				<div class="user">
					<div class="name"><?= $res["username"] ?></div>
					<div class="mail"><?= $res["email"] ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</body>
</html>

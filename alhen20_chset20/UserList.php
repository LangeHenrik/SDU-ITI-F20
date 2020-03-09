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
	<title>User List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="navbar">
		<nav>
			<a href="index.php">Home</a>
			<a href="Picture.php">Image Feed</a>
			<a href="UserList.php" class="active">User List</a>
			<a href="Upload.html">Upload</a>
			<a href="logout.php">Logout</a>
		</nav>
	</div>

	<div class="container">
		<div class="content">
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

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
			<a href="Picture.php" class="active">Pictures</a>
			<a href="UserList.php">Users</a>
			<a href="Upload.html">Upload</a>
			<a href="logout.php">Logout</a>
		</nav>
	</div>

	<div class="container">
		<div class="content">
			<div class="picture">
				<div class="header">header</div>
				<img src="profile1.jpg"/>
				<div class="description">Description this is just a template if there's no database.</div>
			</div>
			<br>
			<?php
			$stmt = $conn->prepare("SELECT site_user.username as username, picture.header as header, picture.description as description, picture.img as img
				FROM user_picture
				INNER JOIN site_user using (user_id)
				INNER JOIN picture using (picture_id)");
			$stmt->execute();
			$result = $stmt->fetchAll();

			foreach($result as $res):?>
				<div class="picture">
					<div class="header"><?= $res["header"] ?> <br/>by<br/> <?= $res["username"] ?></div>
					<img src="<?= $res["img"] ?>"/>
					<div class="description"><?= $res["description"] ?></div>
				</div>
			<?php endforeach; ?>
			<br>
		</div>
	</div>

</body>
</html>

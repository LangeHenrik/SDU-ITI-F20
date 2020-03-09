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
	<title>Image Feed</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="navbar">
		<nav>
			<a href="index.php">Home</a>
			<a href="Picture.php" class="active">Image Feed</a>
			<a href="UserList.php">User List</a>
			<a href="Upload.html">Upload</a>
			<a href="logout.php">Logout</a>
		</nav>
	</div>

	<div class="container">
		<div class="content">
			Search by User or Header: <input type="text" id="query" onkeyup="showResults(this.value)"/>
			<div id="results">
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
					<br>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<script src="script.js"></script>
</body>
</html>

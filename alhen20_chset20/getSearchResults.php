<?php
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
$query = "%".htmlentities(filter_input(INPUT_GET, 'qry', FILTER_SANITIZE_SPECIAL_CHARS))."%";
$stmt = $conn->prepare("SELECT site_user.username as username, picture.header as header, picture.description as description, picture.img as img
	FROM user_picture
	INNER JOIN site_user using (user_id)
	INNER JOIN picture using (picture_id)
	WHERE username LIKE :query
	OR header LIKE :query");
$stmt->bindParam(":query", $query);
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

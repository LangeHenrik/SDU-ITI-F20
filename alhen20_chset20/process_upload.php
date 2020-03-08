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

$header = htmlentities(filter_input(INPUT_POST, 'header', FILTER_SANITIZE_SPECIAL_CHARS));
$description = htmlentities(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
$img_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
$target_file = basename($_FILES['image']['name']);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$img = 'data:image/'.$imageFileType.';base64,'.$img_base64;

$stmt = $conn->prepare("INSERT INTO picture (img,header,description) VALUES (:img,:header,:description)");
$stmt->bindParam(":img", $img);
$stmt->bindParam(":header", $header);
$stmt->bindParam(":description", $description);
$stmt->execute();

$stmt = $conn->prepare("SELECT * FROM picture WHERE img = :img AND header = :header AND description = :description");
$stmt->bindParam(":img", $img);
$stmt->bindParam(":header", $header);
$stmt->bindParam(":description", $description);
$stmt->execute();
$res=$stmt->fetch();

echo $res["picture_id"];

$stmt = $conn->prepare("INSERT INTO user_picture VALUES (:userid,:pictureid)");
$stmt->bindParam(":userid", $_SESSION["user_id"]);
$stmt->bindParam(":pictureid", $res["picture_id"]);
$stmt->execute();

header("Location: Picture.php");
?>

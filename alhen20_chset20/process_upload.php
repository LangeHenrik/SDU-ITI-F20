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

// $stmt = $conn->prepare("INSERT INTO site_user (username,email,pass) VALUES (:uname,:email,:pass)");
// $stmt->bindParam(":uname", $username);
// $stmt->bindParam(":email", $email);
// $stmt->bindParam(":pass", password_hash($password), PASSWORD_DEFAULT);
// $stmt->execute();

header("Location: Picture.php");
?>

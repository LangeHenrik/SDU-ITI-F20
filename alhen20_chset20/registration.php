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

$username = htmlentities(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));
$password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING), PASSWORD_DEFAULT);
$email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

$stmt = $conn->prepare("INSERT INTO site_user (username,email,pass) VALUES (:uname,:email,:pass)");
$stmt->bindParam(":uname", $username);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":pass", $password);
$stmt->execute();

header("Location: index.php");
?>

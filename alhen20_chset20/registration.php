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
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$email = htmlentities(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

$stmt = $conn->prepare("INSERT INTO site_user (username,email,pass) VALUES (:uname,:email,:pass)");
$stmt->bindParam(":uname", $username);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":pass", password_hash($password, PASSWORD_DEFAULT));
$stmt->execute();

$stmt = $conn->prepare("SELECT user_id, username, pass FROM site_user WHERE username = :uname");
$stmt->bindParam(":uname", $username);
$stmt->execute();
$res = $stmt->fetchAll();

foreach($res as $r){
	if(password_verify($password, $r["pass"])){
		$_SESSION["logged_in"]=true;
		$_SESSION["user_id"]=$r["user_id"];
		$_SESSION["uname"]=$r["username"];
		header("Location: index.php");
	}
}

header("Location: index.php");
?>

<?php
ini_set('display_errors', 'on');

function checkUsernameDB ($username) {
	require("config.php");
	$stmt=$db->prepare("SELECT username FROM utilisateur WHERE username=:username");
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$stmt->execute();
	$res = $stmt->rowCount();

	return $res;
}

function checkMailDB ($mail) {
	require("config.php");
	$stmt=$db->prepare("SELECT email FROM utilisateur WHERE email=:mail");
	$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
	$stmt->execute();
	$res = $stmt->rowCount();

	return $res;

}



?>

<?php
ini_set('display_errors', 'on');

function checkUsernameDB ($username) {
	require("config.php");
	$stmt=$db->prepare("SELECT username FROM user WHERE username=:username");
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$stmt->execute();
	$res = $stmt->rowCount();
	var_dump($res);

	return $res;
}

function checkMailDB ($email) {
	require("config.php");
	$stmt=$db->prepare("SELECT email FROM user WHERE email=:email");
	$stmt->bindValue(':email', $email, PDO::PARAM_STR);
	$stmt->execute();
	$res = $stmt->rowCount();
	var_dump($res);

	return $res;

}



?>

<?php

require_once "db.php";

// connect to database (PDO)
$db = DB();

// fetch and filter values from POST data
$id = "";
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
$password = $_POST["password"];

// hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

try {

  // prepare query
  $query = $db->prepare("INSERT INTO users(username, name, email, pswdhash) VALUES (:username, :name, :email, :hash)");

  // bind parameters (sanitize)
  $query->bindParam(':username', $username);
  $query->bindParam(':name', $name);
  $query->bindParam(':email', $email);
  $query->bindParam(':hash', $hash);

  // execute query
  $query->execute();

  // record assigned id
  $id = $db->lastInsertId();

} catch (PDOException $e) {

  die($e->getMessage());

}

// everything went well
echo("success");

?>
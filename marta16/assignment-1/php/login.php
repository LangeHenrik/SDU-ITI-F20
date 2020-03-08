<?php

require_once "db.php";

// start session
session_start();

// fetch values from POST data
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$password = $_POST["password"];

// connect to database (PDO)
$db = DB();

try {

  // prepare query
  $query = $db->prepare("SELECT * FROM users WHERE username = :username");

  // bind parameters (sanitize)
  $query->bindParam(':username', $username);

  // execute query
  $query->execute();
  $row = $query->fetch(PDO::FETCH_ASSOC);

  // get hashed password and other information
  // $hash = $query->fetchColumn();
  $hash = $row["pswdhash"];
  $name = $row["name"];

} catch (PDOException $e) {

  // die($e->getMessage());
  die();

}

// authenticate
if (password_verify($password, $hash)) {

  $_SESSION["username"] = $username;
  $_SESSION["name"] = $name;

  echo("success");
}

?>

<?php

define('DB_USERNAME', "alhen18"); //Database user
define('DB_PASSWORD', "alhen18"); //Database user password
define('DB_NAME', "image_share"); //Database name
define('DB_HOST', "localhost"); //Database host

function getDB() {
  $db_host = DB_HOST;
  $db_name = DB_NAME;
  $db_user = DB_USERNAME;
  $db_pass = DB_PASSWORD;
  try {
    $conn = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_pass); // PDO connect
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch (PDOException $e) {
    echo $e;
  }
}

include_once './account_class.php';

$account = new account();

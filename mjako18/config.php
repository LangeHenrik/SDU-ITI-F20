<?php
session_start();
define(DB_USERNAME, ""); //Database user
define(DB_PASSWORD, ""); //Database user password
define(DB_NAME, "image_share"); //Database name
define(DB_HOST, "localhost"); //Database host

function getDB {
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
    // failed connecting
  }
}

include_once 'account.php';

$account = new account($dbh);

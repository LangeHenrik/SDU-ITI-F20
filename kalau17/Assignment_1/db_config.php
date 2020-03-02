<?php
$servername = "localhost";
$username = "php";
$password = "1234";
$dbname = "kalau17";

if($_POST){
  try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname",
  $username,
  $password,
  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  $stmt = $conn->prepare("SELECT * FROM Author WHERE Author_Id LIKE '%$_POST[name]%' || Author_name LIKE '%$_POST[name]%' || Book_title LIKE '%$_POST[name]%';");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  maketable($result);
  //print_r($result);
  } catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
  }
  $conn = null;
?>

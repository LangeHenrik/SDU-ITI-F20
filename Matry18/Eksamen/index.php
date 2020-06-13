<?php
require_once 'db_config.php';
try {

$conn = new PDO("mysql:host = $servername;dbname=$dbname",
$username,
$password,
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$stmt = $conn->prepare("SHOW DATABASES;");

$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
print_r($result);

} catch (PDOException $e) {
    echo "Error: ".$e->getMessage();
}

$conn = null;



// prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO Person (firstname, lastname, age)
  VALUES (:firstname, :lastname, :age)");
  $stmt->bindParam(':firstname', $firstName);
  $stmt->bindParam(':lastname', $lastName);
  $stmt->bindParam(':age', $age);

  $stmt->execute();


$header = htmlentities(filter_var($_POST['header'], FILTER_SANITIZE_STRING));



  ?>
<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "madja16";
$dBName = "madja16";

$conn = null;

// below is for testing purposes

// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
    
//     // $temp = "secondtest";

//     //$stmt = $conn->prepare("SELECT memmo_username FROM users");
//     // $stmt = $conn->prepare("INSERT INTO users (memmo_id, memmo_username, memmo_pwd) VALUES (NULL, :username, :user_password)");
//     // $stmt->bindParam(':username', $temp, PDO::PARAM_STR);
//     // $stmt->bindParam(':user_password', $temp, PDO::PARAM_STR);
//     // $stmt->execute();
    
//     // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     //     echo $row['memmo_username'];
//     // }
    
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// } finally {
//     $conn = null;
//     // echo "connection closed";
// }

?>
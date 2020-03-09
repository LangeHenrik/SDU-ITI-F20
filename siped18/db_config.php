<?php
$host = "localhost:3306";
$uname = "YOUR_SYSTEM_USER";
$pword = "siped18";
$dbname = "user";

try{
    $conn = new PDO("mysql:host=$server;dbname=$dbname","$uname","$pword");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die('Unable to connect with the database');
}

include_once 'class.user.php';
$user = new USER($DB_con);
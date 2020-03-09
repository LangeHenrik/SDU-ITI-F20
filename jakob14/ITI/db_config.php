<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "itilogin";
$charset = "utf8mb4";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name;cahrset=$charset", $username, $password); 
    // set the PDO error mode to exception
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: ".$e->getMessage();
    }
 ?>
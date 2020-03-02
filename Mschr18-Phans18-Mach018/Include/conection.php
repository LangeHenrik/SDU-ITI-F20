<?php
include 'db_config.php';
try {
    $conn = new PDO("mysql:host=$servername;$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    console.log
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage() . ".\n code "; . $e->getDode()
    }
?>

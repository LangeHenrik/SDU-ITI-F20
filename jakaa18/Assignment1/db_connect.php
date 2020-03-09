<?php
$config = require('db_config.php');
$host = $config["host"];
$dbusername = $config["username"];
$dbpassword = $config["password"];

$db = $config["db"];
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $conn = new PDO($dsn, $dbusername, $dbpassword, $options);
    // set the PDO error mode to exception

    echo "DB Connected successfully \n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
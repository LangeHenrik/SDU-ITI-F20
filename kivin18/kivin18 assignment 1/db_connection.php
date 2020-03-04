<?php
$config = require('db_config.php');
$host = $config["host"];
$db = $config["db"];
$user = $config["user"];
$pass = $config["pass"];

$data_source_name = "mysql:host=$host;dbname=$db";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($data_source_name, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
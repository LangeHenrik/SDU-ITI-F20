<?php
require_once 'db_config.php';

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    if (!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }

} catch(PDOExecption $e){
    echo "Error:" .$e->getMessage();
}
$conn = null;
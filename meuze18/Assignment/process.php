<?php


$servername = "localhost";
$username = "root";
$password = "mehmetdb8";

try {

$conn = new PDO("mysql:host=$servername;dbname=assignmentiti",$username,$password);

$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERR_MODE_EXCEPTION);
echo "connected to server";

}catch(PDOException $e) {
    echo $e.getMessage();
}

?>
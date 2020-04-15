<?php
if (isset($_POST['upload'])){
    include 'db_config.php';

    $username = $_SESSION['username'];
    $header = filter_input(INPUT_POST, 'header', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $imageblob = filter_input(INPUT_POST, 'imageblob', FILTER_SANITIZE_STRING);
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $stmt= $conn->prepare("INSERT INTO image(username, header, description, image)VALUES (:username, :header, :description, :image)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':header', $header);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $imageblob);
    $stmt->execute();
    header("Location: ../imagepage.php");   
} else 
{
    echo 'error';
}
?>
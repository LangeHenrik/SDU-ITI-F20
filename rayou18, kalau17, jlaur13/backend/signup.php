<?php
require_once '../db_config.php';
$username_input = filter_var($_POST["username"],FILTER_SANITIZE_EMAIL);
$password_input = filter_var($_POST["password"],FILTER_SANITIZE_EMAIL);
$repeatPassword = filter_var($_POST["repeat_password"],FILTER_SANITIZE_EMAIL);

$password_hash = password_hash($password_input, PASSWORD_BCRYPT);


//Husk Regex til at validere om password indeholder det rigtge.
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";

    $stmt = $conn->prepare("INSERT INTO user (username,password) values(:username,:password);");
      //$stmt->execute();
    $stmt->bindParam(':username',$username_input, PDO::PARAM_STR);
    $stmt->bindParam(':password',$password_hash, PDO::PARAM_STR);
    $stmt->execute();
    header("Location: ../pages/homepage.php");
}
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }


  /*  if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["repeat_password"])){
      if(filter_var($username,FILTER_SANITIZE_EMAIL) && filter_var($password,FILTER_SANITIZE_EMAIL)&& filter_var($repeatPassword,FILTER_SANITIZE_EMAIL) ){

      }
    } */



 ?>

<?php
require_once '../db_config.php';
session_start();
<<<<<<< Updated upstream
$username_input = filter_var($_GET["username"],FILTER_SANITIZE_EMAIL);
$password_input = filter_var($_GET["password"],FILTER_SANITIZE_EMAIL);
=======
$username_input = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
$password_input = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
>>>>>>> Stashed changes

$password_hash = password_hash($password_input, PASSWORD_BCRYPT);

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql ="SELECT username,password FROM user WHERE username=:username;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username',$username_input,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $row) {
      if($row['username'] == $username_input && password_verify($password_input,$row['password'])){
        $_SESSION['username'] = $username_input;
        $_SESSION['logged_in'] = true;
        header("Location: ../pages/homepage.php");
      }
    }

      header("Location: ../pages/homepage.php");

  }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

/*if($password ==$credentialsMap[$username]){
  $_SESSION['logged_in'] =true;
  echo 'loggedin';
  header("Location: ../pages/homepage.php");
  exit();
}
else{  echo 'Not loggedin';}*/


 ?>

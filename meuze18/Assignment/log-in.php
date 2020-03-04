<?php
    require_once 'config.php';

    try {
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", 
    $username, 
    $password, 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    $stmt = $conn->prepare("SELECT username, passwrd FROM user");

    $stmt->execute(); 
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();

    $usern = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $usernxs = htmlspecialchars($usern);
        
    $pswd = filter_var($_POST['passwrd'], FILTER_SANITIZE_STRING);
    $pswdxs = htmlspecialchars($pswd);

    if(isset($_SESSION['username'])){
        echo "wrong username or password";
      } else {

          if($row['username'] == $usernxs && password_verify($pswdxs, $row['passwrd'])) {
              $_SESSION['username']=$_POST['username'];
              echo "<script> location.href = 'startside.php' </script>";
          }
      }
    } catch(PDOException $e) {
        echo $e.getMessage();
    }
    $conn = null;
    ?>
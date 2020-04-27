<?php
require 'db_config.php';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);


if (session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_POST['btnLogin'])){
    if (empty($username) || empty($password)){
        header("Location: ../index.php");
        exit();
    }
    else {   
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $sql = 'SELECT username, password FROM users WHERE username=:username;';
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetchAll();
        print_r ($result);
        foreach ($result as $user){
            if($user['username'] == $username && password_verify($password, $user['password'])){
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $username; 
                header("Location: ../imagepage.php");        
            } else {
                $_SESSION['logged_in']=false;
                header("Location: ../index.php");
            }
        }

    } 
}
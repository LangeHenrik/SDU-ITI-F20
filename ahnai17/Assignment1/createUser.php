<?php
require_once 'db_config.php';
if (isset($_POST['create'])){
    $username = filter_input(INPUT_POST, 'username') ;
    $password=filter_input(INPUT_POST, 'password');  
    try {
        /* @var $conn PDO */
    $conn = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $createUser = $conn->prepare("INSERT into users (username, password) VALUES ('$username', '$password')");
    $createUser->bindParam('username', $username);
    $password_hash=password_hash($password, PASSWORD_DEFAULT);
    $createUser->bindParam('password', $password);
    $createUser->execute();
    if($createUser && password_verify($password, $password_hash)){
            echo "Registration is complete";
            header("Location: http://localhost:8080/LoginPage.html");
                exit;
        }else{
            echo "Registration failed, please try again.";
            header("Location: http://localhost:8080/Register_new_user.html");
            exit;
        }
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
        echo   "<script>
                    alert('failed to create account'); 
                    window.history.go(-1);
                </script>";
    }
    $conn=null;
} 


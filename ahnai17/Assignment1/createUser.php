<?php
require_once 'db_config.php';
if (isset($_POST['create'])){ 
    $username = filter_input(INPUT_POST, 'username');
    $password=filter_input(INPUT_POST, 'password'); 
    $conn= ConnectToDB();
    $createUser = $conn->prepare("INSERT into users (username, password) VALUES (?, ?)");
    $checkUsername=$conn->prepare("SELECT username FROM users WHERE username = :username");
    $checkUsername->bindParam(':username', $username);
    $checkUsername->execute();
    if($checkUsername->rowCount() > 0){
    echo "Sorry username already exists try another username";
        
    } else {
    $password_hash=password_hash($password, PASSWORD_DEFAULT);
    $createUser->bindParam(1, $username);
    $createUser->bindParam(2, $password_hash);
    $createUser->execute();
        if($createUser && password_verify($password, $password_hash)){
            echo "Registration is complete";
            header("Location: http://localhost:8080/LoginPage.html");
                $conn=null;
                exit;
        }
        else{
            echo "Registration failed, please try again.";
            header("Location: http://localhost:8080/Register_new_user.html");
            $conn=null;
            exit;
        }
    }
}



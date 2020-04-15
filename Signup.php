<?php
if (isset($_POST['Signup'])){
    include 'db_config.php';

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'pwd', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    if (empty($username)|| empty($email) || empty($password)){
        header("Location: ../Registration.php?error=emptyfields&uid=".$username."&email=".$email);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/" ,$password)){
        header("Location: ../Registration.php?error=invalidemailusername");
        exit();
    }

    // regEx
    else if (!preg_match("/[\w]+@+[\w]+./", $email)){
        header("Location: ../Registration.php?error=invalidemail&username=".$username."&email=".$username);
        exit();

    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../Registration.php?error=invalidusername=".$username."&email=".$email);
        exit();
    } 
    else {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $sql = 'SELECT username, email FROM users WHERE username=:username;';
        $stmt = $conn->prepare($sql); 
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $resultCheck = $stmt->fetchAll();
        
        if (sizeof($resultCheck) >= 1){
                header("Location: ../Registration.php?error=usernameoremailtaken");
                exit();
        }
        else {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $stmt= $conn->prepare("INSERT INTO users(username, password, email)VALUES (:username, :password, :email)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hashedPwd);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                header("Location: ../index.php");                
            }
    }  
} else {
    header("Location: ../Registration.php");
    exit();
}

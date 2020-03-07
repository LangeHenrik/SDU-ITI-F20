<?php

    require_once 'config.php';
    try {
        $connection = new PDO("mysql:host=$server;port=3307;dbname=$database", 
        $username_database, $password_database, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $stmt = $connection->prepare("SELECT username, pwd FROM users");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        
        $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $userXSS = htmlspecialchars($user);

        $pass = filter_var($_POST['pwd'], FILTER_SANITIZE_STRING);
        $passXSS = htmlspecialchars($pass);

        if(isset($_SESSION['username'])){
            echo"<a href='logout.php'><input type=button value=Logout name=logout></a>";
        }else{
            foreach($result as $row){
                if($row['username']==$userXSS && password_verify($passXSS, $row['password'])){
                    $_SESSION['usernmae']=$_POST['username'];
                    echo"<script> location.href = 'feed.php'<\script>";
                }else{
                    echo "<script> alert('Log in first to use the feature!')</script>";
                    echo "<script> location.href = 'header.php' </script>";
                }
            }
        }
    }
        catch (PDOException $error){
            echo "ERROR: ".$error->getMessage();
        }
        $connection = null;

?>
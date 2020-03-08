<?php
    require __DIR__ . '/../config.php';

    try {
        $connection = new PDO("mysql:host=$server;dbname=$database", 
        $username_database, $password_database, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $stmt = $connection->prepare("SELECT username, pwd FROM users");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        $user = filter_var($_POST['username-login'], FILTER_SANITIZE_STRING);
        $userXSS = htmlspecialchars($user, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');

        $pass = filter_var($_POST['pwd-login'], FILTER_SANITIZE_STRING);
        $passXSS = htmlspecialchars($pass, ENT_QUOTES | ENT_SUBSTITUTE, 'utf-8');

        if(isset($_SESSION['username'])){
            #echo"<a href='logout.php'><input type=button value=Logout name=logout></a>";
        }else{
            foreach($result as $row){
                print_r($row['username']);
                print_r($userXXS);
                print_r($row['pwd']);
                print_r($passXSS);
                if($row['username']==$userXSS && password_verify($passXSS, $row['pwd'])){
                    $_SESSION['username']=$_POST['username-login'];
                    #$path_feed = __DIR__ . '\..\feed.php';
                    echo"<html><script>window.location.href = './../feed.php'</script></html>";
                }else{
                    #$path_index = __DIR__ . '\..\index.php';
                    echo "<html><script> alert('Log in first to use the feature!')</script>";
                    echo "<script>window.location.href = './../index.php' </script></html>";
                }
            }
        }
    }
        catch (PDOException $error){
            echo "ERROR: ".$error->getMessage();
        }
        $connection = null;

?>
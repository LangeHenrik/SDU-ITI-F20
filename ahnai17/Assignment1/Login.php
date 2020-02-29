<?php  
session_start();
require_once 'db_config.php';   
$username = filter_input(INPUT_POST, 'username');
$password=filter_input(INPUT_POST, 'password');
try {
        /* @var $conn PDO */
    $conn = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $sql = "SELECT username, password FROM users WHERE username='$username'";
    $loggin = $conn->prepare($sql);
    $loggin->bindParam('password', $password);
    $password_hash=password_hash($password, PASSWORD_DEFAULT);
    $loggin->execute();
    $output = 'login error';

if ($loggin->execute() && $row = $loggin->fetch())
{
    if ( $row['password']===$password)
    {
        // Account found
        if ( $row['activated'] !== 0 ) {
            $output = 'not activated';
            $_SESSION['username'] = $username;
        } else {
        $output = 'logged in';
         header("Location: http://localhost:8080/Home.html");
            exit;
        }
    }
}
    echo $output;
    } catch (PDOException $e){
        echo "Error: " . $e->getMessage();
    }

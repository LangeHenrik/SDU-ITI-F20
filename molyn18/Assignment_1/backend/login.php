<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';

$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$repeat_password = filter_var($_POST["repeat-password"], FILTER_SANITIZE_STRING);

if ($password != $repeat_password){

}

try {
    $db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db_conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute([$username]);

    $userlist = $stmt->fetchAll();

    if (isset($userlist[0])) {
        if (password_verify($password, $userlist[0]['password'])) {
            $_SESSION["username"] = $username;
            header("location: ../feed.php",  true,  301 );  exit;
        }
    }
    header("location: ../index.html",  true,  301 );  exit;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
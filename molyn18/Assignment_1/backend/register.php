<?php
require_once 'config.php';

$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
$repeat_password = filter_var($_POST["repeat-password"], FILTER_SANITIZE_STRING);

if($password != $repeat_password or !preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/', $password)){
    header('test',  true,  400 );  exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

try {
    $db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db_conn->prepare("SELECT username FROM user WHERE username=?");
    $stmt->execute([$username]);
    $tmp = $stmt->fetch();
    if($tmp){
        header('test',  true,  404 );  exit;
    }

    $stmt = $db_conn->prepare("insert into user set username=?, password=?");
    $stmt->execute([$username, $hash]);
    header('test',  true,  200 );  exit;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
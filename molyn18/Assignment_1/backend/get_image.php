<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (is_null($_SESSION["username"])) {
    exit();
}
require_once 'config.php';

try {
    $db_conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db_conn->prepare("SELECT img FROM photo WHERE imgID=:id");
    $stmt->execute(['id' => $_GET['img']]);

    $image = $stmt->fetch();

    header("Content-type: image/jpeg");
    $image['img']??= '';
    echo base64_decode($image['img']);


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
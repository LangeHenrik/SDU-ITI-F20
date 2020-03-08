<?php
include_once "DBConfig.php";
try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

function query($query, $paramArray){
    global $pdo;
    $stmt = $pdo -> prepare($query);
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    $stmt -> execute($paramArray);
    return $stmt -> fetchAll();
}


<?php
//Todo Connecet to DB via DPO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=wsws', 'root');
} catch (PDOException $e) {
    print "Fejl!: " . $e->getMessage() . "<br/>";
    die();
}

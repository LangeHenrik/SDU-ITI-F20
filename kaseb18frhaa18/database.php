<?php

require_once 'db_config.php';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT person_id, name, username, passwordHASH FROM person");
    $stmt->execute();

    // set the resulting array to associative
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    print_r($result);

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
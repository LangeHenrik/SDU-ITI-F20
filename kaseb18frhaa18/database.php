<?php

require_once 'db_config.php';
function getInfoFromDB($statement) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($statement);
        $stmt->execute();

    // set the resulting array to associative
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>
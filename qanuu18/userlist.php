<?php
session_start();

require_once 'extfiles/config.php';

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

    $query = $conn->prepare("SELECT username FROM user");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    foreach($result as $row) {
        echo "<p>$row[username]</p>";
    }
}
catch(PDOException $e)
{
    echo "error: " . $e->getMessage();
}

$conn = null;
?>
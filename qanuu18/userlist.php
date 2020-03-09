<?php
session_start();

require_once 'extfiles/config.php';
echo"helo";

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

    
        
    
    $query = $conn->prepare("SELECT user FROM userinfo");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    foreach($result as $row) {
        echo "<p>$row[user]</p>";
    }
}
catch(PDOException $e)
{
    echo "error: " . $e->getMessage();
}

$conn = null;
?>
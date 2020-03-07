<?php
session_start();

require_once 'extfiles/config.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
if (isset($_POST['registrate'])) {
        
        $query = "INSERT INTO TABLE (username, password) VALUES(:usernameIp, :passwordIp)";
        $stmt  = $conn->prepare($query);
        $stmt->execute();
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();

        
    }
    echo  " you are now registred as a user go back and login.";
}
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    $conn = null;

?>


<?php

// include_once "../app/core/db_config.php";

include_once "../../core/db_config.php";

if (isset($_GET['user_name'])) 
{
    try {
    
        $username = $_GET['user_name'];
    
        $conn = new PDO("mysql:host=$servernametest;dbname=$dbnametest", $usernametest, $passwordtest);
    
        $stmt = $conn->prepare("SELECT username FROM users WHERE username = :username");
    
        $stmt->bindParam(':username', $username);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            echo '<span class="text-danger">Username not available</span>';
        } else {
            echo '<span class="text-success">Username available</span>';
        }
        
    
    } catch (PDOException $e) { 
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }
}


?>
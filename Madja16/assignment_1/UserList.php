<?php
session_start();
if (isset($_SESSION['session_id'])) {
    
    require_once "dbh.inc.php";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("SELECT memmo_username FROM users");
        $stmt->execute();

        echo '<a href="index.php">Back</a>';

        while ($result = $stmt->fetch(PDO::FETCH_OBJ)) {
            echo '<p>'.$result->memmo_username.'</p>';
            echo '<hr>';
        }
        
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        $conn = null;
    }

}
else {
    header("Location: index.php?error=nologindetected");
    exit();
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="header.css">
    </head>
</html>
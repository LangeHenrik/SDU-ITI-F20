
<?php

require_once "dbh.inc.php";

// Opening a new database connection every for every keyup event is pretty bad
try {

    $notice = "";

    $conn = new PDO("mysql:host=$servername;dbname=$dBName", $dBUsername, $dBPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $conn->prepare("SELECT memmo_username FROM users WHERE memmo_username=:username");
    $stmt->bindParam(':username', $_GET['q'], PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        $notice = "This username is taken";
    } 
    // echo $_GET['q'];

    // fancy conditional statement
    echo $notice === "" ? "" : $notice;

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
} finally {
    $conn = null;
}

?>

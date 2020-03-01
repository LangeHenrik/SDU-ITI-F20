<?php
session_start();
if ($_SESSION["logged_in"] ?? false) {
    require("db_connection.php");
    $stmt = $pdo->query('SELECT username FROM user');
    while ($row = $stmt->fetch()) {
        echo "<li>", $row['username'], "</li>";
    }
}
?>

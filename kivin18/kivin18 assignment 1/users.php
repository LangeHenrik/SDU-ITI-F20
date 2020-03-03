<?php
session_start();
if ($_SESSION["logged_in"] ?? false) {
    require("db_connection.php");
    $stmt = $pdo->query('SELECT username, join_date FROM user');
    while ($row = $stmt->fetch()) {
        echo "<li>", $row['username'], " - joined on ", $row['join_date'], "</li>";
    }
}
?>

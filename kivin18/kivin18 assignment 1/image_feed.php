<?php
session_start();
if ($_SESSION["logged_in"] ?? false) {
    require("db_connection.php");
    $stmt = $pdo->query('SELECT username, image_path, header, description, date_added FROM image');
    while ($row = $stmt->fetch()) {
        echo "<h5>", $row["username"], "<h5>";
        echo '<img src="' . "uploads/" . $row["image_path"] . '"/>';
        echo "<h7>", $row["header"], "<h7>";
        echo "<p>", $row["description"], "<p>";
        echo "<p>", $row["date_added"], "<p>";
    }
}
?>

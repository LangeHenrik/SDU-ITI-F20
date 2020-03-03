<?php
session_start();
if ($_SESSION["logged_in"] ?? false) {
    require("db_connection.php");
    $stmt = $pdo->query('SELECT username, image_path, header, description, date_added FROM image ORDER BY image_id DESC');
    while ($row = $stmt->fetch()) {
        echo "<div class='userImage'/>";
        echo "<h3>", $row["username"], "</h3>";
        echo '<img src="' . "uploads/" . $row["image_path"] . '" width="500" height="auto"/>';
        echo "<p>", $row["header"], "</p>";
        echo "<p>", $row["description"], "</p>";
        echo "Added on: ","<p>", $row["date_added"], "</p>";
        echo "</div>";
    }
}
?>

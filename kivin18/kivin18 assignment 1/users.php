<?php
$counter = 0;
require("db_connection.php");
$stmt = $pdo->query('SELECT username FROM user');
while ($row = $stmt->fetch()) {
    echo "<li>", $row['username'], "</li>";
}
echo $counter;
$counter++;
?>

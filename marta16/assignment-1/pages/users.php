<?php

// check login
require $_SERVER['DOCUMENT_ROOT'] . "/php/check_login.php";

// connect to database (PDO)
require_once $_SERVER['DOCUMENT_ROOT'] . "/php/db.php";
$db = DB();

// query
$users = $db->query("SELECT * FROM users");

// output table
echo "<table class=\"table-userdata\">";
echo "<tr><th>Id</th><th>Username</th><th>Name</th><th>Email</th></tr>";

foreach( $users as $row) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "</tr>";
}

echo "</table>";

?>
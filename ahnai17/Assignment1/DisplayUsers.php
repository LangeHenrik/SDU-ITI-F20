<?php
require_once 'db_config.php';

$search_username = filter_input(INPUT_GET, ['search_username']);
$con= ConnectToDB();
$search="SELECT id, username FROM users WHERE id = :id";
$result=$con->prepare($search);
$result->bindParam(":id", $search_username);
$result->setFetchMode(PDO::FETCH_ASSOC);
$result->execute();
if (!empty($search_username)){    
echo "<table>
<tr>
<th>Id</th>
<th>Username</th>
</tr>";
while($row = $result->fetchAll()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "</tr>";
}
echo "</table>";
} else {
    echo 'try to search user by id';
}




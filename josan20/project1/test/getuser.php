<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
            padding: 5px;
        }

        th {text-align: left;}
    </style>
</head>
<body>

<?php
$q = intval($_GET['q']);
$q=3;

require_once 'config.php';

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM MyGuests WHERE id = '".$q."'";

if($stmt = $pdo->prepare("SELECT * FROM MyGuests WHERE id = :limit, :offset")){
    $stmt->execute(['limit' => $limit, 'offset' => $offset]);
    $data = $stmt->fetchAll();
// and somewhere later:
    foreach ($data as $row) {
        echo $row['name']."<br />\n";
    }

} else{
    echo "Oops! Something went wrong. Please try again later.";
}

echo "<table>
<tr>
<th>Firstname</th>

</tr>";
//<th>Lastname</th>
//<th>Age</th>
$row = mysqli_fetch_array($result);
print_r($row);
//exit;
while($row) {
    console.log( "<tr>");
    console.log( "<td>" . htmlspecialchars($row['username']) . "</td>");
//    console.log("<td>" . htmlspecialchars($row['password']) . "</td>");
//    console.log( "<td>" . htmlspecialchars($row['reg_date']) . "</td>");
    console.log( "</tr>");
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
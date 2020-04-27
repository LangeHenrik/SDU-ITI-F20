<?php
require_once 'core/init.php';

$user = new User();
if(isset($_GET['q']) && $user->isLoggedIn()) {
$q = intval($_GET['q']);
$getUser = DB::getInstance()->query("SELECT * FROM users WHERE id = '".$q."'");

echo '<head>
<link rel="stylesheet" href="style.css">
</head>

<table>
<tr>
<th>Name</th>
<th>Joined</th>
</tr>';
foreach($getUser->results() as $getUser) {
    echo "<tr>";
    echo "<td>" . $getUser->name . "</td>";
    echo "<td>" . $getUser->joined . "</td>";
    echo "</tr>";
}
echo "</table>";
} else {
    Redirect::to('userlist.php');
}
?>
</body>
</html>
<?php

include '../app/views/partials/newUserNav.php';

require_once '../app/models/User.php';


?>

<!DOCTYPE html>
<link rel="stylesheet" href="/abtho16/mvc/public/content/css/user.css">

<table>
<tr>
<th>
<span>User Id<span>
</th>
<th>
<span>Username</span>
</th>
<th>
<span>First Name<span>
</th>
<th>
<span>Last Name<span>
</th>
<th>
<span>Zip Code<span>
</th>
<th>
<span>City<span>
</th>
<th>
<span>Email<span>
</th>
<th>
<span>Number<span>
</th>
</tr>

<?php

foreach($viewbag['users'] as &$value) {
    echo '<tr>';
    echo '<td>'.$value->user_id.'</td>';
    echo '<td>'.$value->username.'</td>';
    echo '<td>'.$value->first_name.'</td>';
    echo '<td>'.$value->last_name.'</td>';
    echo '<td>'.$value->zip.'</td>';
    echo '<td>'.$value->city.'</td>';
    echo '<td>'.$value->email.'</td>';
    echo '<td>'.$value->number.'</td>';
    echo '</tr>';
}

?>

</table>
</html>

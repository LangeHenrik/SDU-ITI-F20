<?php

include '../app/views/partials/newUserNav.php';

?>

<!DOCTYPE html>
<link rel="stylesheet" href="/abtho16/mvc/public/content/css/user.css">
<link rel="stylesheet" href="/abtho16/mvc/public/content/css/login_Reg.css">
<body class="content">
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
<span>Your City<span>
</th>
<th>
<span>Your email<span>
</th>
<th>
<span>Phone Number<span>
</th>
</tr>
<?php

foreach($viewbag['users'] as &$value) {
    echo '<tr>';
    echo '<td>'.$value['userid'].'</td>';
    echo '<td>'.$value['username'].'</td>';
    echo '<td>'.$value['firstname'].'</td>';
    echo '<td>'.$value['lastname'].'</td>';
    echo '<td>'.$value['zipcode'].'</td>';
    echo '<td>'.$value['city'].'</td>';
    echo '<td>'.$value['email'].'</td>';
    echo '<td>'.$value['phonenumber'].'</td>';

    echo '</tr>';
}

?>

</table>

<?php include '../app/views/partials/foot.php'; ?>
</body>
</html>


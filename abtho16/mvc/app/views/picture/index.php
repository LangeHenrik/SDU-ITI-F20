<?php

include '../app/views/partials/newUserNav.php';

require_once '../app/models/Picture.php';

?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" href="/abtho16/mvc/public/content/css/index.css">
</head>
<table>
<tr>
<th>
<span>Picture Id<span>
</th>
<th>
<span>User</span>
</th>
<th>
<span>Header<span>
</th>
<th>
<span>Description<span>
</th>
</tr>

<?php

foreach($viewbag['pics'] as &$value) {
    echo '<tr>';
    echo '<td>'.$value->picture_id.'</td>';
    echo '<td>'.$value->user.'</td>';
    echo '<td>'.$value->header.'</td>';
    echo '<td>'.$value->description.'</td>';
    echo '</tr>';
    echo '<tr>';
	echo "<td>".'<img src="data:image/jpeg;base64,'.base64_encode( $value->picture ).'"/>'."</td>";
    echo '</tr>';
}

?>

</table>
</html>

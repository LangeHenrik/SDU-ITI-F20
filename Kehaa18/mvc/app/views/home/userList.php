<?php include '../app/views/partials/menu.php'; ?>

<body>
<div class="main" align="center">

<?php


    echo"<table class='usertable'>";

    foreach($viewbag as $user){

        echo"<tr>";
        echo"<td>$user[id]</td>";
        echo"<td>$user[username]</td>";
        echo"</tr>";
    }

    echo"</table>";


?>
    </div>
    </body>

<?php include '../app/views/partials/foot.php'; ?>
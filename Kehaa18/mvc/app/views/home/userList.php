<?php include '../app/views/partials/menu.php'; ?>

<body>
<div class="main" align="center">

<?php

    //As long as the result of the sql query is not empty populate the view/table with the user information: usernames and user ids.
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
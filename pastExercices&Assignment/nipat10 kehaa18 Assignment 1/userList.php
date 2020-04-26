<?php

//Require the header page.
require 'header.php';

if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    //User not logged in. Redirect them back to the login page.
    header('Location: index.php');
    exit;
}

//Require the database connection file.
require 'config.php';

$sql = "SELECT * FROM users";
$users = $db->query($sql);
$users->execute();

?>


<body>
<div class="main" align="center">
    <table class="usertable">
        <tr>
            <th>ID</th>
            <th>Username</th>
        </tr>
        <?php

        //Populate table with all users from $users.
        foreach ($users as $user) {
            echo "<tr>" .
                "<td>" . $user['id'] . "</td>" .
                "<td>" . $user['username'] . "</td>" .
                "</tr>";
        }
        ?>

    </table>
    </div>
</body>



<?php
//Include the footer page.
include 'footer.php';
?>
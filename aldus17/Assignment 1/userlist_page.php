<?php
require_once('dbconfig/config.php');
require_once('dbconfig/dbControl.php');

?>
<!DOCTYPE html>

<header>
    <title>Userlist page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userlist_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</header>

<body>
    <h1>User list</h1>
    <?php

    $query = getAllUsers();
    while ($row = mysql_fetch_array($query)) {
        echo "<tr>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "</tr>";
    }
    ?>
    </div>
</body>
<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>

</html>
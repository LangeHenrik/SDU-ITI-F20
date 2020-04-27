<?php include '../app/views/partials/menu.php'; ?>

<h2>Users</h2>

<form>
    Find user: <input type="text" onkeyup="findUsers(this.value)">
</form>

<table class="user-table" id="users">
    <?php
    $table = "<tr><th>Username</th></tr>";

    foreach ($viewbag as $username) {
        $table .= "<tr> <td> $username[username] </td> <tr>";
    }
    echo $table;
    ?>
</table>
<script src="/siped18-timch15/mvc/public/js/searchResults.js"></script>

<?php include '../app/views/partials/foot.php'; ?>
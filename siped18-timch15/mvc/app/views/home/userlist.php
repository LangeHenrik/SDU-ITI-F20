<?php include '../app/views/partials/menu.php'; ?>

<h2>Users</h2>

<form>
    Search for user: <input type="text" onkeyup="findUsers(this.value)">
</form>

<table class="user-table" id="user-table">
    <?php $result_table = "<tr><th>Username</th></tr>";

    if (isset($viewbag)) {
        if (count($viewbag) == 0) {
            $result_table .= "<tr><td> No Results! </td></tr>";
        } else {
            $usercount = sizeof($viewbag);

            for ($i = 0; $i < $usercount; $i++) {
                $result_table .= "<tr><td>" . $viewbag[$i]['username'] . "</td></tr>";
            }
        }
    }
    echo $result_table; ?>
</table>




<script src="/siped18-timch15/mvc/public/js/searchResults.js"></script>

<?php include '../app/views/partials/foot.php'; ?>
<?php include '../app/views/partials/header.php'; ?>


<div class="wrapper">
    <div class="contentlist" id="nig">
        <form>
            Find user: <input type="text" onkeyup="findUsers(this.value)">
        </form>
        <table class="userlist" id="users">
            <?php
            $hint = "<tr><th>Name</th>
            <th>Username</th>
            </tr>";
            foreach ($viewbag as $name) {
                $hint .= "<tr> <td> $name[name] </td> <td> $name[username] </td> <tr>";
            }
            echo $hint;
            ?>
        </table>

    </div>
</div>
<?php include '../app/views/partials/header.php'; ?>

<div class="formContent" id="formContent">
        <b><h1>User List</h1></b>
        <i><h3>bellow are the list of registered useres</h3></i>
        <form>
        <table class="userlist" id="users">
            <?php
            $hint = "<tr><th>Email</th>
            <th>Username</th>
            </tr>";
            foreach ($viewbag as $name) {
                $hint .= "<tr> <td> $name[email] </td> <td> $name[username] </td> <tr>";
            }
            echo $hint;
            ?>
        </table>
        </form>
    </div>
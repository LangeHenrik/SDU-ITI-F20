<?php include '../app/views/partials/menu.php'; ?>

<div class="container center_div">
    <h2>List of users</h2>

    <form>
        Find user: <input type="text" onkeyup="findUsers(this.value)">
    </form>
    <div class="col-sm-4">
        <table class="table table-striped" id="users">
            <?php
            $table = "<thead class='thead-dark'>
                <tr>
                    <th scope='col'>Username</th>
                </tr>
            </thead>";

            foreach ($viewbag as $username) {
                $table .= "<tr> <td> $username[username] </td> <tr>";
            }
            echo $table;
            ?>
        </table>
    </div>
</div>
<script src="/siped18-timch15/mvc/public/js/searchResults.js"></script>

<?php include '../app/views/partials/foot.php'; ?>
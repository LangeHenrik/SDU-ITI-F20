<?php 
include '../app/views/partials/menu.php';
?>

    <div class="wrapper">
            <h1>Users</h1>
        <div class='content'>
            <table class="usertable">
                <thead>
                    <tr>
                        <th>Userid</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $users = $viewbag['users'];
                    foreach ($users as $usr){
                     ?>
                        <tr>
                            <td><?php echo $usr['user_id']; ?></td>
                            <td><?php echo $usr['username']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
    </div>

<?php 
include '../app/views/partials/foot.php';
?>

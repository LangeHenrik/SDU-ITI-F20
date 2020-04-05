<?php include '../app/views/partials/menu.php'; ?>
<div class="pb-2 mt-4 mb-2 border-bottom">
    <h1>Users</h1>
</div>

<ul class="list-group">
    <?php
    foreach ($viewbag as &$user):
        echo '<li class="list-group-item list-group-item-dark">' . 'Username: ' . $user['username'] . '</li>';
        echo '<li class="list-group-item list-group-item-light">' . 'Joined: ' . $user['join_date'] . '</li>';
    endforeach;
    ?>
</ul>

<?php include '../app/views/partials/foot.php'; ?>




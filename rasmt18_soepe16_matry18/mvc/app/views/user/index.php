<?php include '../app/views/partials/menu.php'; ?>
    <div class="content">
        <h1>List of registered users</h1>
        <ul>
        <?php foreach ($viewbag['users'] as $user):?>
            <li><?=$user['username'];?></li>
        <?php endforeach;?>
        </ul>
    </div>
<?php include '../app/views/partials/foot.php'; ?>
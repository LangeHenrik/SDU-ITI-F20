<?php include '../app/views/partials/menu.php'; ?>
    <div class="content">
        <div class="jumbotron bg-white">
            <h1>List of registered users</h1>
            <hr>
            <ul>
            <?php foreach ($viewbag['users'] as $user):?>
                <li><?=$user['username'];?></li>
            <?php endforeach;?>
            </ul>
        </div>
    </div>
<?php include '../app/views/partials/foot.php'; ?>
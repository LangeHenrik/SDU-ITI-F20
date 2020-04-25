<?php
include '../app/views/partials/menu.php'; ?> 

<div class="wrapper">
    <div class="content">
        <?php 
        $users = $viewbag['users'];
        foreach ($users as $user) { 
            ?>
            <div class="post">
                <p><?php echo $user['username']; ?> </p>
                <p><?php echo $user['email']; ?></p>
                <br />
            </div>
        <?php } ?>
    </div>
</div>

<?php
include '../app/views/partials/foot.php'; ?> 
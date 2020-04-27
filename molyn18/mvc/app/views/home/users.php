<?php include '../app/views/partials/head.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>
<?php
foreach ($viewbag['users'] as $content) { ?>
    <div class='user-box'>
        <div class="content">
            <div class="meta">
                <span class="author"><?php echo $content['username']; ?></span>
            </div>
        </div>
    </div>
<?php } ?>
<?php include '../app/views/partials/foot.php'; ?>
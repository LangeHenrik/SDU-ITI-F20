<?php
include '../app/views/partials/menu.php'; ?>

<div class="container">
    <div class="content">
        <?php foreach ($viewbag['users'] as $user):?>
            <div class="user">
                <div class="name"><?= $user['username']; ?> </div>
                <div class="mail"><?= $user['email']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include '../app/views/partials/footer.php'; ?>

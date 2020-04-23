<?php include '../app/views/partials/menu.php'; ?>

<div class="wrapper">
    <div class="content">

        <div class="post">
            <p class="username"><em><?= $viewbag['currentUser'] ?></em> posted:</p>
            <div class="post-content">
                <img src="<?= $viewbag['image'] ?>" alt="<?= $viewbag['currentUser'] ?>.png">
                <p class="post-title"><?= $viewbag['userPostHeader'] ?></p>
                <p class="post-description"><?= $viewbag['userPostDescription'] ?></p>
            </div>
        </div>
        <hr>

    </div>
</div>

<?php include '../app/views/partials/foot.php'; ?>
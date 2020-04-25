<?php include '../app/views/partials/menu.php'; ?>


<?php for ($i = 0; $i < sizeof($viewbag) - 1; $i++) { ?>

    <div class="post">
        <p class="username"><em><?= $viewbag['currentUser'] ?></em> posted:</p>
        <div class="post-content">
            <img src="<?= $viewbag[$i]['image'] ?>" alt="<?= $viewbag['currentUser'] ?>.png">
            <p class="post-title"><?= $viewbag[$i]['title'] ?></p>
            <p class="post-description"><?= $viewbag[$i]['description'] ?></p>
        </div>
    </div>
    <hr>

<?php } ?>


<?php include '../app/views/partials/foot.php'; ?>
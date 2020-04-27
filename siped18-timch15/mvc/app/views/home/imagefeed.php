<?php include '../app/views/partials/menu.php'; ?>


<?php for ($i = 0; $i < sizeof($viewbag) - 1; $i++) { ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $viewbag[$i]['title'] ?> &nbsp;<small><em><?= $viewbag['currentUser'] ?></em> posted:</small></h5>
            <img style="max-height: 80vh; max-width: 100%;" class="image-fluid" src="<?= $viewbag[$i]['image'] ?>" alt="<?= $viewbag['currentUser'] ?>.png">
            <p class="card-text"><?= $viewbag[$i]['description'] ?></p>
        </div>
    </div>

<?php } ?>


<?php include '../app/views/partials/foot.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>


<?php for ($i = 0; $i < sizeof($viewbag) - 1; $i++) { ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $viewbag[$i]['title'] ?> &nbsp;<small><em><?= $viewbag['currentUser'] ?></em> posted:</small></h5>
            <!-- <h6 class="card-subtitle float-right"><em><?= $viewbag['currentUser'] ?></em> posted:</h6> -->
            <img style="max-height: 100%; max-width: 100%;" class="image-fluid" src="<?= $viewbag[$i]['image'] ?>" alt="<?= $viewbag['currentUser'] ?>.png">
            <p class="card-text"><?= $viewbag[$i]['description'] ?></p>
        </div>
    </div>
    <!-- <hr> -->

<?php } ?>


<?php include '../app/views/partials/foot.php'; ?>
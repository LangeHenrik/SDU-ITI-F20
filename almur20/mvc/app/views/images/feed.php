<?php include '../app/views/partials/menu.php'; ?>

    <div class="image_feed" id="image_square">
        <?php
        if ($_SESSION['images_count'] > 0) {
            for ($count = 0; $count < $_SESSION['images_count']; $count++) {
        ?>
            <div class="image_card">
                <p class="requirements"><?php echo $viewbag[$count]['username'];?></p>
                <img src="<?php echo ('./' . $viewbag[$count]['image']);?>" alt="<?php echo $viewbag[$count]['header'];?>">
                <h3><?php echo $viewbag[$count]['header'];?></h3>
                <p class="requirements"><?php echo $viewbag[$count]['description'];?></p>
            </div>
        <?php
            }
        } else {?>
            <h3>No images to show.</h3>
        <?php } ?>
    </div>

<?php include '../app/views/partials/foot.php'; ?>
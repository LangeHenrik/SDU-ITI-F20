<?php include '../app/views/partials/menu.php'; ?>

<div class="main" align="center">
    <div id="gridview">
        <?php
        

        //As long as the result of the sql query is not empty populate the view/table with images, their headers, descriptions and user ids.
        if (!empty($viewbag)) {
            foreach ($viewbag as $key => $value) {
        ?>
                <div class="images">
                    <?php
                    ?> <div class="image">

                            <h2><?php echo $viewbag[$key]["header"] ?></h2><br>
                            <img src="<?=$viewbag[$key]['image']?>">
                            <hr>
                            <h2>Image Description: </h2>
                            <p><?php echo $viewbag[$key]["description"] ?></p><br>
                            <hr>
                            <p>User: <?php echo $viewbag[$key]["user_id"] ?></p><br>
                        </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php include '../app/views/partials/foot.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>

<div class="main" align="center">
    <div id="gridview">
        <?php
        

        //As long as the result of the sql query is not empty populate the view/table with images, their headers, descriptions and user.
        if (!empty($viewbag)) {
            foreach ($viewbag as $key => $value) {
        ?>
                <div class="images">
                    <?php
                    ?> <div class="image">

                            <h2><?php echo $viewbag[$key]["header"] ?></h2><br>

                            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($key["image"]). '"/><br>'; ?>
                            <hr>
                            <h2>Image Description: </h2>
                            <p><?php echo $viewbag[$key]["description"] ?></p><br>
                            <hr>
                            <p>User: <?php echo $viewbag[$key]["username"] ?></p><br>
                        </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php include '../app/views/partials/foot.php'; ?>
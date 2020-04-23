<?php include '../app/views/partials/menu.php'; ?>

    <div style="text-align:center">
        <?php
        //print_r($viewbag);
        for ($count = 0; $count < count($viewbag); $count++)
        { 
        ?>
            <div class="useritem">
            <h3><?php echo $viewbag[$count]['username']?></h3>
            </div>
        <?php
        } 
        ?>
    </div>

<?php include '../app/views/partials/foot.php'; ?>
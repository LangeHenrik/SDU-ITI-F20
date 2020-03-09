<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $filter = $_GET['filter'];
    if ($_GET['image_exists'] == 1) {
        $images_exist = true;
    } else {
        $images_exist = false;
    }
    $stmt = $_GET['stmt'];
    $results = $_SESSION['results'];
?>

<?php
    //echo strlen($filter);
    if ($images_exist) {
        for ($count = 0; $count < $stmt; $count++) {
            if (substr($results[$count]['username'], 0, strlen($filter)) == $filter) {
    ?>
            <div class="image_card">
                <p class="requirements"><?php echo $results[$count]['username'];?></p>
                <img src="<?php echo $results[$count]['image'];?>" alt="<?php echo $results[$count]['header'];?>">
                <h3><?php echo $results[$count]['header'];?></h3>
                <p class="requirements"><?php echo $results[$count]['description'];?></p>
            </div>
    <?php
            }
        }
    } else {?>
        <h3>No images to show.</h3>
<?php } ?>
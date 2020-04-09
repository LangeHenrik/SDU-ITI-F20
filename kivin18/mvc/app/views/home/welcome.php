<?php include '../app/views/partials/menu.php'; ?>

    <div class="pb-2 mt-4 mb-2 border-bottom">
        <h1>Welcome to Image Feed!</h1>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php $counter = 0;
            foreach ($viewbag as $image) {
                if($counter == 0) {
                    echo '<div class="carousel-item active">';
                } else {
                    echo '<div class="carousel-item">';
                }
                echo '<img src="data:image/jpeg;base64,' . base64_encode($image['image']) . '"class="d-block w-100" alt="image"/>';
                echo '</div>';
                $counter++;
            }
            ?>
        </div>
    </div>

<?php include '../app/views/partials/foot.php'; ?>
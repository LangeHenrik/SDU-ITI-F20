<?php include '../app/views/partials/menu.php'; ?>

    <div class="pb-2 mt-4 mb-2 border-bottom">
        <h1>Images</h1>
    </div>

<?php
foreach ($viewbag as $image) {

    echo "<div class='userImage'/>";
    echo '<img class="img-fluid" alt="image" src="data:image/jpeg;base64,' . base64_encode($image['image']) . '" />';
    echo "<div class='jumbotron'>";
    echo "<h1 class='display-4'>", $image["header"], "</h1>";
    echo "<p class='lead'>", $image["description"], "</p>";
    echo "<hr class='my-4'>";
    echo "<small class='text-muted'>User: " . $image["username"] . "</small> <br/>";
    echo "<small class='text-muted'>Added on: " . $image["date_added"] . "</small>";
    echo "</div>";
    echo "</div>";

}

include '../app/views/partials/foot.php';

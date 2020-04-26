<?php include '../app/views/partials/menu.php'; ?>
<div class="container">
    <div class="label">Image Feed</div>

    <?php
    foreach ($viewbag as $value) {

    }

    if (is_array($viewbag) || is_object($viewbag)) {
        foreach ($viewbag as $value) {
            echo "<div class='container'> ";
            echo "<div class='header'>";
            echo $value['title'];
            echo "</div>";
            echo "<div class='description'>";
            echo $value['description'];
            echo "</div>";
            echo "<div class='upLoadBy'>";
            echo "Uploadet by:";
            echo "</div>";
            echo "<div class='upLoadName'>";
            echo $value['user'];
            echo "</div>";
            echo "" . "<br>";
            $image =$value['image'];
            echo "<img src='$image'>";
//            echo "<img src='$image' width=\"250\" height=\"250\">";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class=container> ";
        echo "<label class='label'> ";
        echo "No image uploaded";
        echo "</label> ";
        echo "</div>";
    }

    include '../app/views/partials/foot.php';
    ?>
</div>

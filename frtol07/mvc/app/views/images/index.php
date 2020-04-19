<?php include '../app/views/partials/menu.php'; ?>
<div class="container">


    <?php

    if (is_array($viewbag) || is_object($viewbag)) {
        foreach ($viewbag as $value) {
            echo "<div class='container'> ";
            echo "<div class='header'>";
            echo $value['header'];
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
            echo "<div class='image'> ";
            $image = "../". $value["image"];
//            echo '<img src="' . $value["image"] . '" width="250" height="250"/>';
            echo '<img src="' . $image . '" width="250" height="250"/>';
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

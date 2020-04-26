<?php include '../app/views/partials/header.php'; ?>

<div class='wrapper'>
    <div class='imagefeed'>
        <h1>Image Feed</h1>
        <?php
        $imageFeed = "";
        foreach ($viewbag as $value) {
            $imageFeed  .=
                "<br><div id=formContent><br>Image Title: $value[header]<br>
                <img src='$value[image]'></img><br>
                <p>$value[username]: $value[description]</p><br>
                            </div>";
        }
        echo $imageFeed;
        ?>
    </div>
</div>

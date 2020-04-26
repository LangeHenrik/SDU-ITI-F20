<?php include '../app/views/partials/header.php'; ?>

<div class="formContent" id="formContent">
    <div class='imagefeed'>
        <h1>Image Feeds</h1>
        <?php
        $imageFeed = "";
        foreach ($viewbag as $value) {
            $imageFeed  .=
                "<br><div id=formContent><br>Image Title: $value[header]
                <hr>
                <img src='$value[image]'></img>
                <br>
                <p>$value[username] says: $value[description]</p><br>
                            </div>";
        }
        echo $imageFeed;
        ?>
    </div>
</div>

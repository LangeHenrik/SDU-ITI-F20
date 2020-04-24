<?php include '../app/views/partials/header.php'; ?>

<div class='wrapper'>
    <div class='imagefeed'>
        <h1>Image Feed</h1>
        <?php
        $imageFeed = "";
        foreach ($viewbag as $value) {
            $imageFeed  .=
                "<div class='description'>
                            <img src=$value[image] alt=virk />
                            <br/>
                            <p>$value[title]</p>
                            <h3>$value[description]</h3>
                            <br/>
                            <h4>$value[username]</h4>
                            </div>";
        }
        echo $imageFeed;
        ?>
    </div>
</div>
<?php include '../app/views/partials/header.php'; ?>

<div class='wrapper'>
    <h1>Feeds</h1>
    <div class='feedContent'>
        <?php
        $imageFeed = "";
        foreach ($viewbag as $value) {
            $imageFeed  .=
                "<div class='feedContent'>
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
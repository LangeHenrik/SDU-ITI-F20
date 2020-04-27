<?php include '../app/views/partials/head.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>
<?php
foreach ($viewbag['images'] as $content) { ?>
    <div class='image-box'>
        <div class="content">
            <img src="<?php echo $content['img']?>">
            <div class="meta">
                <h3 class="title"><?php echo $content['title']; ?></h3>
                <hr>
                <span class="author"><?php echo $content['username']; ?></span>
                <span class="desc"><?php echo $content['description']; ?></span>
            </div>
        </div>
    </div>
<?php } ?>
<?php include '../app/views/partials/foot.php'; ?>
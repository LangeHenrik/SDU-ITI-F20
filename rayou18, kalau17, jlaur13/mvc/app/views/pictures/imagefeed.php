<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../app/views/partials/header.php'?>
    <link rel="stylesheet" href="/rayou18, kalau17, jlaur13/mvc/public/styles/imagefeed.css">
    <title>Image Feed</title>
</head>
<body>
    <?php include "../app/views/partials/menu.php" ?>
    <div class="container">
        <h1 class="text-center">Image Feed</h1>
        <hr>
        <div class="row" id="image-row">
            <?php
            foreach ($viewbag['image'] as $item) {
                $header = $item['header'];
                $picture = $item['picture'];
                $description = $item['description'];
                $pictureOwner = $item['user'];
                ?>
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="border rounded-lg bg-gradient word-wrap">
                        <h2 class="word-wrapper"> <?php echo $header; ?></h2>
                        <img class="img-fluid img-thumbnail rounded" src="<?php echo $picture; ?>"
                             alt="<?php echo $header; ?>">
                        <p class="word-wrapper"><?php echo $description; ?></p>
                        <p class="float-right badge badge-dark"><?php echo $pictureOwner; ?></p>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>

    <?php include "../app/views/partials/foot.php"; ?>
</body>
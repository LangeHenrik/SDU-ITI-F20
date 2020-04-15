<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Feed</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" href="/rayou18,%20kalau17,%20jlaur13/mvc/public/styles/background.css">
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
                    <div class="border rounded-lg bg-gradient">
                        <h2> <?php echo $header; ?></h2>
                        <img class="img-fluid img-thumbnail rounded" src="<?php echo $picture; ?>"
                             alt="<?php echo $header; ?>">
                        <p><?php echo $description; ?></p>
                        <p><?php echo $pictureOwner; ?></p>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </div>

    <!-- Bootstrap scripts-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
</body>
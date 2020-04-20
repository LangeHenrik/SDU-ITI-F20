<!doctype html>
<html lang="en">
<head>
    <?php include '../app/views/partials/header.php'?>
    <title>User List</title>
    <link rel="stylesheet" href="/rayou18_kalau17_jlaur13/mvc/public/styles/background.css">
</head>
<body>
    <?php include "../app/views/partials/menu.php" ?>

    <div class="container">
        <h1 class="text-center">User List</h1>
        <hr>
        <?php
        foreach ($viewbag['user'] as $item) {
            ?>
            <div class="d-flex justify-content-center">
                <?php echo $item['username'] ?>
            </div>
        <?php }
        ?>
    </div>
<?php include "../app/views/partials/foot.php"; ?>
</body>
</html>
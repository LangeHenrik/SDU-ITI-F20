<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
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
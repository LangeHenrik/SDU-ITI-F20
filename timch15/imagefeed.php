<?php
session_start();
require_once 'login_check.php';
require_once 'database_controller.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>ITI Ass.1 - Image Feed</title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <?php include 'menu.php'; ?>
    </nav>

    <div class="wrapper">
        <div class="content">
            <?php
            $all_posts = get_image_posts();
            echo '<h3>There are '. sizeof($all_posts) . ' posts in the imagefeed.</h3><hr>';

            for ($i = 0; $i < sizeof($all_posts); $i++) {
                $image = $all_posts[$i]['picture'];
                $user = $all_posts[$i]['uploader'];
                $header = $all_posts[$i]['header'];
                $description = $all_posts[$i]['description'];

                echo
                '<div class="post">
                    <p class="username"><em>'.$user.'</em> posted:</p>
                    <div class="post-content">
                        <img src="'.$image.'" alt="'.$user.'.png">
                        <p class="post-title">'.$header.'</p>
                        <p class="post-description">'.$description.'</p>
                    </div>
                </div>
                <hr>';
            }
            ?>
        </div>
    </div>
</body>

</html>
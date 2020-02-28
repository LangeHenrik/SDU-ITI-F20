<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');
session_start();

$usercontroller = new UserController();
$userimagefeedArray = $usercontroller->getAllUserImageFeed();
UserController::logout();
?>

<!DOCTYPE html>

<header>
    <title>Imagefeed</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/imagefeed_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">

</header>

<body>
    <h1>Imagefeed</h1>

    <div class="navbar" id="navbar">
        <a class="active" href="front_page.php">Home</a>
        <a href="upload_page.php">Upload</a>
        <a href="userlist_page.php">Userlist</a>
    </div>
    <form method="post">
        <div class="inner_container">
            <button class="logoutbtn" name="logoutbtn" type="submit">Log Out</button>
        </div>
    </form>
    <div class="imagefeed_wrapper">
        <div class="imagefeed_content">
            <?php foreach ($userimagefeedArray as $imagePost) { ?>
                <div class="imagefeed">
                    <h1>
                        <?php echo $imagePost['title']; ?>
                    </h1>
                    <p>
                        <?php echo $imagePost['description']; ?>
                    </p>

                    <img src=<?php echo $imagePost['image']; ?> />

                    <p>
                        <i>
                            <?php echo 'Posted by:' . str_repeat('&nbsp;', 2)  . $imagePost['username'] . str_repeat('&nbsp;', 2) .
                                'Created on: ' . $imagePost['creationTime']; ?>
                        </i>
                    </p>

                <?php
            }
                ?>
                </div>

        </div>
    </div>

</body>

<!--
<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>
-->
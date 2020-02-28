<?php
include 'includes/autoload.php';

?>
<?php
session_start();

$userController = new UserController();
$posts = $userController->getAllPosts();

Utility::redirectIfNotLoggedIn();
Utility::logoutPressed();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Feed</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/CSS/stylesheet.css">
    <html lang="en">
</head>

<body>
    <nav>
        <div class="center">
            <ul class="menu">
                <li><a href="image_feed.php">Image feed</a></li>
                <li><a href="upload.php">Upload picture</a></li>
                <li><a href="user_list.php">Users</a></li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="content">
            <?php foreach ($posts as $post) { ?>
                <div class="post">
                    <h1><?php echo $post['title']; ?></h1>
                    <p><?php echo 'Posted by: ' . $post['username'] . ' at ' . $post['timestamp']; ?> </p>
                    <img src=<?php echo $post['image']; ?> />
                    <p><?php echo $post['COMMENT']; ?></p>
                    <br />
                </div>
            <?php
            } ?>
        </div>
    </div>

    <form method="POST">
        <input type="submit" name="logout" id="logout" value="Logout" />
    </form>
</body>

</html>
<?php
include 'includes/autoload.php';
?>
<?php
session_start();

$userController = new UserController();
$users = $userController->getAllUsers();

Utility::redirectIfNotLoggedIn();
Utility::logoutPressed();

?>

<!DOCTYPE html>
<html>

<head>
    <title>User list</title>
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
                <li>
                    <form class="logout" method="POST">
                        <input type="submit" name="logout" id="logout" value="Logout" />
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="content">
            <?php foreach ($users as $user) { ?>
                <div class="post">
                    <p><?php echo $user['username']; ?> </p>
                    <p><?php echo $user['email']; ?></p>
                    <br />
                </div>
            <?php } ?>
        </div>
    </div>

</body>

</html>
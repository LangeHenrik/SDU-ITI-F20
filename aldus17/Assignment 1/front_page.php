<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');
?>
<?php

UserController::checkSession();
UserController::sessionRedirect();
UserController::logout();

?>

<!DOCTYPE html>

<header>
    <title>Homepage</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/front_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">
</header>

<body>
    <div class="navbar" id="navbar">

        <ul>
            <li><a class="active" href="#homepage">Home</a></li>
            <li> <a href="upload_page.php">Upload</a></li>
            <li> <a href="imagefeed_page.php">Imagefeed</a></li>
            <li> <a href="userlist_page.php">Userlist</a></li>
            <li>
                <form method="post">
                    <div class="inner_container">
                        <button class="logoutbtn" name="logoutbtn" type="submit">Log Out</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>

    <div id="main-wrapper" class="main_wrapper">
        <h2 class="front_page-header">Homepage page</h2>
        <h3 class="front_page-subheader">Welcome to the frontpage
            <?php
            $usercontroller = new UserController();
            $user = $usercontroller->getUserByUsername($_SESSION['username']);
            foreach ($user as $u) {
                if ($u['username'] == $_SESSION['username']) {
                    echo str_repeat('&nbsp;', 2) . "<u>" . $u['fullname'] . "</u>" . str_repeat('&nbsp;', 2);
                }
            }
            if (!empty($_SESSION['username'])) {
                $username = $_SESSION['username'];
                echo 'Your username is: ' . str_repeat('&nbsp;', 2) . "<u>" . $username . "</u>";
            }
            ?>
        </h3>
    </div>
</body>
</html>
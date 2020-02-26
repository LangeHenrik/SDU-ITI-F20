<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');

$usercontroller = new UserController();
$usersArray = $usercontroller->getAllUsers();

?>
<!DOCTYPE html>

<header>
    <title>Userlist page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userlist_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</header>

<body>

    <h1>User list</h1>

    <div class="navbar" id="navbar">
        <a class="active" href="index.php">Home</a>
        <a href="upload_page.php">Upload</a>
        <a href="imagefeed_page.php">Image feed</a>
    </div>

    <div class="userlist_wrapper">
        <div class="userlist_content">
            <table class="userlist_table">
                <tr>
                    <th>Username</th>
                    <th>fullname</th>
                </tr>
                <?php foreach ($usersArray as $user) { ?>
                    <tr>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['fullname']; ?></td>
                    </tr>
                <?php
                } ?>
            </table>
        </div>
    </div>
    <form method="post">
        <div class="inner_container">
            <button class="logoutbtn" name="logoutbtn" type="submit">Log Out</button>
        </div>
    </form>
    <?php

    $userController = new UserController();

    // TODO get user list of all users and print them out

    ?>
    </div>
</body>
<!--
<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>
-->

</html>
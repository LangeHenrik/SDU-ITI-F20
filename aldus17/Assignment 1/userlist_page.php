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
    <title>Userlist page</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userlist_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="js/ajaxCallUserlist.js"></script>
    <html lang="en">
</header>

<body>
    <div class="navbar" id="navbar">
        <ul>
            <li><a class="active" href="front_page.php">Home</a></li>
            <li> <a href="upload_page.php">Upload</a></li>
            <li> <a href="imagefeed_page.php">Imagefeed</a></li>
            <li> <a href="#userlist">Userlist</a></li>
            <li>
                <form method="post">
                    <div class="inner_container">
                        <button class="logoutbtn" name="logoutbtn" type="submit">Log Out</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>

    <div class="userlist_wrapper">
        <div class="userlist_content">
            <h1>User list</h1>

            <table class="userlist_table">
                <tr>
                    <th>Fullname</th>
                    <th> Username</th>
                </tr>
                <?php //Data from the Ajax call at the bottom of the file 
                ?>
                <tbody id="data"></tbody>

            </table>
        </div>

    </div>

    </div>
</body>



</html>
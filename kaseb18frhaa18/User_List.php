<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    echo '<h3 id="name">' . $_SESSION["name"] . '</h3>';
} else {
    header("location: index.php");
    exit;
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location: index.php");
}

?>



<html>

<head>
    <title>Title of the document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="FindUsers.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<!--Comment-->

<body onload="findUsers('')">
    <div class="wrapper">
        <div class="menu">
            <h2>Menu</h2>
            <ul>
                <li> <a href=# onclick="alert('You are already logged in.')">Login</a></li>
                <li> <a href=registration.php>Register</a></li>
                <li> <a href=uploadpage.php>Upload</a></li>
                <li> <a href=ImageFeed.php>Image Feed</a></li>
                <li> <a href=User_List.php>User List</a></li>
                <form method="POST">
                    <button name="logout" type="logout" value="logout">Log out</button>
                </form>
            </ul>
        </div>
    </div>

    <div class="wrapper">
        <div class="contentlist">
            <form>
                Find user: <input type="text" onkeyup="findUsers(this.value)">
            </form>
            <div>
                <table class="userlist" id="users"></table>
            </div>
        </div>
    </div>

</body>

</html>
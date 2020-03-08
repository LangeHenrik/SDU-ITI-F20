<?php

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) {
    echo '<ul class="menu">
        <li><a href="index.php">Frontpage</a></li>
        <li><a href="registrationpage.php">Registration page</a></li>
    </ul>';
} elseif ($_SESSION['logged_in'] == true) {
    echo '<ul class="menu">
    <li><a href="uploadpage.php">Upload page</a></li>
    <li><a href="imagefeed.php">Image feed</a></li>
    <li><a href="userlist.php">User list</a></li>
    <form method="post">
        <input type="submit" name="logout" class="logout" value="Logout">
    </form>
</ul>';
}


// https://www.geeksforgeeks.org/how-to-call-php-function-on-the-click-of-a-button/
if (isset($_POST['logout'])) {
    // $_SESSION['logged_in'] = false;
    session_unset();
    header("Location: index.php");
}

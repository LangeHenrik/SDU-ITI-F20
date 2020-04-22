<html>
<head>
    <script src="../js/js.js"></script>
</head>
<body>

<div class="homepage1">
    <ul>
        <li><a onclick="showHomeLink()" href="#" id="homelink">Home</a></li>
        <li><a onclick="showPhotoLink()" href="#" id="photolink">Upload Photos</a></li>
        <li><a onclick="showUsersLink()" href="#" id="userslink">Users</a></li>
        <li><a href="logout.php" id="logout">Logout</a></li>
    </ul>
</div>


<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>

    <a href="/Henrik/mvc/public/user/logout">log out</a>

<?php endif; ?>

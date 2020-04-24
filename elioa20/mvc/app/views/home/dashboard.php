<?php
if(!isset($_SESSION['logged_in']) && !$_SESSION['logged_in'])
    header('Location: /elioa20/mvc/public/home/index');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Odin's Blog</title>
    <link rel="stylesheet" type="text/css" href="/elioa20/mvc/public/css/dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

<div class="topnav" id="dashboardTopNav">
    <ul>
        <li id="feed" class="active"><a href="#" id="link_feed">Feed</a></li>
        <li id="upload"><a href="#" id="link_upload">Upload Image</a></li>
        <li id="users"><a href="#" id="link_users">Users</a></li>
        <li id="logout"><a href="#" id="link_logout">Log Out</a></li>
    </ul>
</div>


<div class="main_content">

</div>

<script type="text/javascript" src="/elioa20/mvc/public/js/dashboard.js"></script>
</body>
</html>

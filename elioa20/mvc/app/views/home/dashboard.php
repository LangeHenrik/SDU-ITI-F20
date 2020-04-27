<?php
if(!isset($_SESSION['logged_in']) && !$_SESSION['logged_in'])
    header('Location: /elioa20/mvc/public/home/index');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Odin's Blog</title>
    <link rel="stylesheet" type="text/css" href="/elioa20/mvc/public/css/dashboard.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

<div class="card-group card-columns">
<div class="main_content">

</div>
</div>


<script type="text/javascript" src="/elioa20/mvc/public/js/dashboard.js"></script>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>

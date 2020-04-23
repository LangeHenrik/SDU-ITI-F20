<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device width, initial scale=1.0">
    <link rel="stylesheet" type="text/css" href="/akvis18/mvc/public/css/Style.css">
    <link rel='icon' href='/akvis18/mvc/public/Images/favicon.ico' type='image/x-icon'/ >
    <title>
        <?php
        if (isset($title)) {
            echo $title . " | FaceWall";
        } else {
            echo "FaceWall";
        } ?>
    </title>
</head>
<body>
    <div class="navbar">
        <a href="index"><img src="/akvis18/mvc/public/Images/Navbar-logo.png" alt="Logo" height="20px" width="auto"></a>

<?php
    if ($viewbag['logged_in']){
        print '<div class="dropdown"><button class="dropbtn">';
        print  $viewbag['user_name'].'  ';
        if ($viewbag['user_avatar'] == null){
            print '<img class="nav-avatar" src="/akvis18/mvc/public/Images/default-user.png">';
        } else {
            print '<img class="nav-avatar" src="data:image/jpeg;base64,' .  $viewbag['user_avatar'] . '" />  ';
        }
        print '</button>
                  <div class="dropdown-content">
                   <form method="post" enctype="application/x-www-form-urlencoded" action="/akvis18/mvc/public/home/logout">
                    <input type="hidden" name="logout" value="true">
                    <button type="submit">Logout</button>
                  </form>
                  </div></div>
                  <a href="/akvis18/mvc/public/home/Users">Users</a>
                  <a href="/akvis18/mvc/public/home/Upload">Upload</a>
                  <a href="/akvis18/mvc/public/home/Feed">Feed</a></div>';
    } else {
        print '<a href="/akvis18/mvc/public/home/Register">Register</a>
               <a href="/akvis18/mvc/public/home/Login">Log in</a></div>';
    }
?>

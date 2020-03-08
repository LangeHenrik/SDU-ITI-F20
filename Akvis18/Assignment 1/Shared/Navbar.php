<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device width, initial scale=1.0">
    <link rel="stylesheet" type="text/css" href="Shared/Style.css">
    <link rel='icon' href='../Images/favicon.ico' type='image/x-icon'/ >
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
<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(isset($_POST["logout"]) && $_POST["logout"] ==true){
        $_SESSION["LoggedIn"] = false;
        session_destroy();
        header('Location: /index.php');
    }
    print '<div class="navbar">
               <a href="/Index.php"><img src="../Images/Navbar-logo.png" alt="Logo" height="20px" width="auto"></a>';

    if (isset($_SESSION["LoggedIn"]) and $_SESSION["LoggedIn"] === true){
        include_once 'DBConnect.php';
        $r = query('SELECT avatar FROM user WHERE user_id = ?;',[$_SESSION['id']]);
        print '<div class="dropdown"><button class="dropbtn">';
        print  $_SESSION['username'].'  ';
        if ($r[0]['avatar'] == null){
            print '<img class="nav-avatar" src="Images/default-user.png">';
        } else {
            print '<img class="nav-avatar" src="data:image/jpeg;base64,' . base64_encode( $r[0]['avatar'] ) . '" />  ';
        }
         print '</button>
              <div class="dropdown-content">
               <form method="post">
                <input type="hidden" name="logout" value="true">
                <button type="submit">Logout</button>
              </form>
              </div></div>
              <a href="/Users.php">Users</a>
              <a href="/Upload.php">Upload</a>
              <a href="/Feed.php">Feed</a></div>';
    } else {
        print '<a href="/Register.php">Register</a>
               <a href="/Login.php">Log in</a></div>';
} ?>


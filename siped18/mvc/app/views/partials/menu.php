<?php
    session_start();
?>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /*  Style of the Navbar*/
        .navbar {
        overflow: hidden;
        background-color: #333;
        position: fixed; /* Set the navbar to fixed position */
        top: 0; /* Position the navbar at the top of the page */
        width: 100%; /* Full width */
        }
  
        /* Links inside the navbar */
        .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        }
  
        /* Change background on mouse-over */
        .navbar a:hover {
        background: #ddd;
        color: black;
        } 
    </style>
    </head>
    <body>
    <?php 

        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
            echo '<div class="navbar">
                    <a href="Imagepage.php">Images</a>
                    <a href="Uploadpage.php">Upload</a>
                    <a href="Userlist.php">Users</a>
                </div>';
        } elseif ($_SESSION['logged_in'] == false){
            echo '<div class="navbar">
                    <a href="/siped18/mvc/public/Home">Login</a>
                    <a href="/siped18/mvc/public/Register/">Registration</a>
                </div>';
        }

?>

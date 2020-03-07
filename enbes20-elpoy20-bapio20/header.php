<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device width, initial scale=1.0">
    <script src="js/myscripts.js"></script>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/contact_style.css"> -->
    <script src="https://kit.fontawesome.com/76e1f178ab.js" crossorigin="anonymous"></script>

    <title>SDU-ITI-F20</title>
  </head>
    <body>
      <?php if (!empty($_SESSION['username'])) {
              include('navUser.php');
            }
            else {
              include('navVisitor.php');
            }

      ?>

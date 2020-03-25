<?php
//session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device width, initial scale=1.0">
    <script src="<?= URL.'js/myscripts.js?v=1' ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?= URL.'css/style.css' ?>">
    <script src="<?= URL.'js/76e1f178ab.js' ?>" crossorigin="anonymous"></script>

    <title><?= $viewbag['title'] ?? 'welcome' ?> | SDU-ITI-F20</title>

  </head>
    <body>
      <div class="navbar">
           <ul>
             <li><a href="<?= URL.'home'?>"><span><i class="fas fa-home"></i></span>HOME</a></li>

      <!-- Check if the user is logged to call the good navbar -->
      <?php
        if (!empty($_SESSION['username'])) {
      ?>
           <li><a href="<?= URL.'contact' ?>"><span><i class="fas fa-address-book"></i></span>Contacts</a></li>
           <li><a href="<?= URL. 'feed' ?>"><span><i class="fas fa-images"></i></span>Feed</a></li>
           <li><a href="<?= URL.'feed/upload' ?>"><span><i class="fas fa-arrow-circle-up"></i></span>Upload</a></li>
           <li class="right"><a href="<?= URL.'home/logout'?>"><span><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
      <?php
        }
        else {
         ?>
           <li><a href="<?= URL.'home/login'?>">Login</a></li>
           <li><a href="<?= URL.'home/register'?>">Register</a></li>
         <?php
        }
      ?>
         </ul>
      </div>

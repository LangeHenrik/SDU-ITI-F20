<html>
  <head>
    <title><?php echo $viewbag["Title"] ?></title>
    <link type="text/css" rel="stylesheet" href="<?php echo DOC_ROOT; ?>/CSS/responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo DOC_ROOT; ?>/CSS/design.css">
    <link type="text/css" rel="stylesheet" href="<?php echo DOC_ROOT; ?>/CSS/gallery.css">
  </head>
  <body>
    <header>
      <nav class="nav navbar-fixed">
        <ul class="hide-s">
          <?php
            if(empty($viewbag["inside"])) { /* NOT LOGGED IN */
          ?>
          <li class="menu skew-right float_right menu-right-end hidden"><a href="<?php echo DOC_ROOT; ?>/upload">upload</a></li>
          <li class="menu skew-right float_right hidden"><a href="<?php echo DOC_ROOT; ?>/gallery">pictures</a></li>
          <li class="menu skew-right float_right hidden"><a href="<?php echo DOC_ROOT; ?>/user">users</a></li>
          <li class="menu skew-right float_right shown menu-right-end <?php if($viewbag["currentPage"] == "register") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/register">register</a></li>
          <li class="menu skew-right float_right <?php if($viewbag["currentPage"] == "home") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/home">frontpage</a></li>
          <?php
            } else { 
          ?>
          <li class="menu skew-right float_right menu-right-end <?php if($viewbag["currentPage"] == "upload") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/upload">upload</a></li>
          <li class="menu skew-right float_right <?php if($viewbag["currentPage"] == "gallery") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/gallery">pictures</a></li>
          <li class="menu skew-right float_right <?php if($viewbag["currentPage"] == "account") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/user">users</a></li>
          <li class="menu skew-right float_right hidden menu-right-end"><a href="register">register</a></li>
          <li class="menu skew-right float_right <?php if($viewbag["currentPage"] == "home") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/home">frontpage</a></li>
          <?php
            }
          ?>
        </ul>
  <!-- folding menu -->
        <div class="hide-l hide-m menu-toggle" onclick="menu_toggle();"><span class="float_right">&#9776;</span></div>
        <ul id="mobile-menu" class="hide-l hide-m hide-s">
          <?php
            if(empty($viewbag["inside"])) { /* NOT LOGGED IN */
          ?>
          <li class="menu <?php if($viewbag["currentPage"] == "home") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/home">frontpage</a></li>
          <li class="menu shown <?php if($viewbag["currentPage"] == "register") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/register">register</a></li>
          <li class="menu hidden"><a href="user">users</a></li>
          <li class="menu hidden"><a href="gallery">pictures</a></li>
          <li class="menu hidden"><a href="upload">upload</a></li>
          <?php
            } else { 
          ?>
          <li class="menu <?php if($viewbag["currentPage"] == "home") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/home">frontpage</a></li>
          <li class="menu hidden"><a href="register">register</a></li>
          <li class="menu shown <?php if($viewbag["currentPage"] == "user") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/user">users</a></li>
          <li class="menu shown <?php if($viewbag["currentPage"] == "gallery") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/gallery">pictures</a></li>
          <li class="menu shown <?php if($viewbag["currentPage"] == "upload") { ?>menu-current<?php } ?>"><a href="<?php echo DOC_ROOT; ?>/upload">upload</a></li>
          <?php
            }
          ?>
  <!-- folding menu -->
        </ul>
      </nav>
    </header>


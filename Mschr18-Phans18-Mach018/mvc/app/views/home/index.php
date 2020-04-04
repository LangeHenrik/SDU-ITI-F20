<?php
/*************************     INFO N STUFF     ******************************** 
 echo " \$_SERVER['HTTP_HOST'] : ------------- " . $_SERVER['HTTP_HOST'];
 echo "<br> \$_SERVER['DOCUMENT_ROOT'] : --- " . $_SERVER['DOCUMENT_ROOT'];
 echo "<br> \$_SERVER['REQUEST_URI'] : .--------- " . $_SERVER['REQUEST_URI'];
 echo "<br> \$_SERVER['SCRIPT_NAME'] : .--------- " . $_SERVER['SCRIPT_NAME'];
 echo "<br> \$_SERVER['SCRIPT_FILENAME'] : --- " . $_SERVER['SCRIPT_FILENAME'];
 echo "<br> \$_SERVER['PATH_INFO'] : -------------- " . $_SERVER['PATH_INFO'];
 echo "<br> \$_SERVER['PHP_SELF'] : ---------------- " . $_SERVER['PHP_SELF'];
 echo "<br> \$_SERVER['HTTP_HOST'] : ------------- " . $_SERVER['HTTP_HOST'];
 echo "<br> __DIR__ : ------------------------------------ " . __DIR__;
 echo "<br> dirname(__DIR__) : ------------------------ " . dirname(__DIR__);
  echo "<br> getcwd() : ------------------------------------ " . getcwd();
  echo "<br> __FILE__ : ----------------------------------- " . __FILE__;
  ?>
  <br><br>
    <a target="_blank" href="https://www.php.net/manual/en/reserved.variables.server.php">
      https://www.php.net/manual/en/reserved.variables.server.php
    </a><?php
  echo "<br> \$_SERVER :";
  ?>
  <pre><?=print_r($_SERVER)?></pre> 
  <?php
  die();
*******************************************************************************/
  
  include_once('../app/views/partials/header.php');

?>
    <section id="content">
        <h1 id="title">Welcomme to </h1> <?php include('../app/views/partials/chalkbordlogo.php') ?>
        <div class="welcomme" id="welcomme">
          <h2><i class="fas fa-user-friends fa-xs"></i> Connect widt you friends.</h2>
          <h2><i class="fas fa-image fa-xs"></i> Post images.</h2>
          <h2><i class="far fa-comments fa-xs"></i> Share comments.</h2>
          <br>
          <h2>Please login or <a href="registration.php">sign up <i class="fas fa-user-plus fa-s"></i></a></h2>


          <form class="orm-group custom-nav-collapse-show" method="post" action="Include/phpUtils/login.php" >
            <?php
              include('../app/views/partials/loginFormContent.php');
             ?>
           </form>

        </div>
    </section>

<?php
 include_once('../app/views/partials/footer.php');
?>

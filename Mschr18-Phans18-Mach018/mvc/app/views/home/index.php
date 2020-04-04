<?php
//*************************     INFO N STUFF     ******************************** 
?>
  $_SERVER['HTTP_HOST'] : ------------- <?=$_SERVER['HTTP_HOST']?>
  <br> $_SERVER['DOCUMENT_ROOT'] : --- <?=$_SERVER['DOCUMENT_ROOT']?>
  <br> $_SERVER['REQUEST_URI'] : .--------- <?=$_SERVER['REQUEST_URI']?>
  <br> $_SERVER['SCRIPT_NAME'] : .--------- <?=$_SERVER['SCRIPT_NAME']?>
  <br> $_SERVER['SCRIPT_FILENAME'] : --- <?=$_SERVER['SCRIPT_FILENAME']?>
  <br> $_SERVER['PATH_INFO'] : -------------- <?=$_SERVER['PATH_INFO'] ?? 'NULL / Not set'?>
  <br> $_SERVER['HTTP_REFERER'] : -------- <?=$_SERVER['HTTP_REFERER'] ?? 'NULL / Not set'?>
  <br> $_SERVER['PHP_SELF'] : ---------------- <?=$_SERVER['PHP_SELF']?>
  <br> $_SERVER['HTTP_HOST'] : ------------- <?=$_SERVER['HTTP_HOST']?>
  <br> DIRECTORY_SEPARATOR : ------------- <?=DIRECTORY_SEPARATOR?>
  <br> __DIR__ : ------------------------------------- <?=__DIR__?>
  <br> dirname(__DIR__) : ------------------------- <?=dirname(__DIR__)?>
  <br> getcwd() : ------------------------------------- <?=getcwd()?>
  <br> __FILE__ : ------------------------------------ <?=__FILE__?>
  <br><br>
      <?php define('BASE_URL', '//' . $_SERVER['HTTP_HOST'] . '/Mschr18-Phans18-Mach018/mvc/public/'); ?>
      <a target="_blank" href="<?=BASE_URL?>">BASE_URL</a> : --------------------------------- <?=BASE_URL?>
  <br><br>
      <a target="_blank" href="https://www.php.net/manual/en/reserved.variables.server.php">
          https://www.php.net/manual/en/reserved.variables.server.php
      </a>
  <br> $_SERVER :
      <pre>
          <?php print_r($_SERVER) ?>
      </pre> 
  <?php
  die();
//*******************************************************************************/
  
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

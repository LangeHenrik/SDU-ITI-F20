<?php
  include_once('../app/views/partials/header.php');
?>
    <section id="content">
        <h1 id="title">Welcomme to </h1> <?php include_once('../app/views/partials/chalkbordlogo.php') ?>
        <div class="welcomme" id="welcomme">
          <h2><i class="fas fa-user-friends fa-xs"></i> Connect widt you friends.</h2>
          <h2><i class="fas fa-image fa-xs"></i> Post images.</h2>
          <h2><i class="far fa-comments fa-xs"></i> Share comments.</h2>
          <br>
          <h2>Please login or <a href="registration.php">sign up <i class="fas fa-user-plus fa-s"></i></a></h2>


          <?php
            include('../app/views/partials/loginform.php');
           ?>
        </div>
    </section>

<?php
 include_once('../app/views/partials/footer.php');
?>

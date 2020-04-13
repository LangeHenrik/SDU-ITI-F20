<?php
  include_once('../app/views/partials/header.php');
?>
    <section id="content">
      <div class="Unauthorized">
        <h1>Web page error: 401 Unauthorized!</h1>
        <h2><a href="<?=BASE_URL?>home/index">Go to frontpage <i class="fas fa-house-damage"></i></a></h2>
        <h2>login</h2>
        <?php
          include('../app/views/partials/loginform.php');
         ?>
         <h2><a href="<?=BASE_URL?>user/signup">Sign up <i class="fas fa-user-plus fa-s"></i></a></h2>

      </div>
    </section>
<?php
 include_once('../app/views/partials/footer.php');
?>

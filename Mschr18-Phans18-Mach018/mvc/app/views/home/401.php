<?php
  $_SESSION['page_titel'] .= " | 401";
  $_SESSION['page_header::before'] = "";
  $_SESSION['page_header::after'] = "";
  $_SESSION['page_sub_header'] = "Web page error: 401 Unauthorized!";

  include_once('../app/views/partials/header.php');
?>
<div class="page container-fluid custom-container">
  <div class="container">

    <div class="unauthorized">
      <h1>Unauthorized!</h1>
      <h2><a href="<?=BASE_URL?>home/index">Go to frontpage <i class="fas fa-house-damage"></i></a></h2>
      <h2>login</h2>
      <?php
        include('../app/views/partials/loginform.php');
       ?>
       <h2><a href="<?=BASE_URL?>user/signup">Sign up <i class="fas fa-user-plus fa-s"></i></a></h2>

    </div>

  </div>
</div>

<?php
 include_once('../app/views/partials/footer.php');
?>

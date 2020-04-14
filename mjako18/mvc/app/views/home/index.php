<?php include '../app/views/partials/menu.php'; ?>
<section>
  <div class="container-fluid fixed-nav">
    <div class="col-xl-8 col-m-8">
      <div>
        <p>Introduction text</p>
      </div>
    </div>
    <div class="col-xl-4 col-m-4">
    <?php
      if(empty($viewbag["inside"])) { /* NOT LOGGED IN */
        include '../app/views/partials/loginform.php';
      } else {
        include '../app/views/partials/logoutform.php';
      }
    ?>
    </div>
  </div>
</section>

<?php include '../app/views/partials/foot.php'; ?>

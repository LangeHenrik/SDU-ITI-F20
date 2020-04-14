<?php include '../app/views/partials/menu.php'; ?>
<section>
  <div class="container-fluid fixed-nav">
    <div class="col-xl-8 col-m-8" id="userlist"></div>
    <div class="col-xl-4 col-m-4">
    <?php include '../app/views/partials/logoutform.php' ?>
    </div>
  </div>
</section>
  <script type="text/javascript" src="<?php echo DOC_ROOT; ?>/js/users.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', getUserList, false);
  </script>
<?php include '../app/views/partials/foot.php'; ?>

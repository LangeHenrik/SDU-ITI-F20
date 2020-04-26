<?php 
include "../app/views/partials/head.php"; 
include '../app/views/partials/menu.php';
?>
<div class="container">
    <div class ="row">
        <div class ="col-12">
<?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) : ?>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome</h1>
    <p class="lead">This is my (Nicholai Bjerke Jensen) answer to Assignemt 2 in Internet Technology F2020.</p>
  </div>
</div>

<?php else: ?>
    <?php header("Location: /njens16/mvc/public/user/login");?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php include '../app/views/partials/foot.php'; ?>

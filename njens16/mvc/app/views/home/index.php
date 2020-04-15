<?php 
include "../app/views/partials/head.php"; 
include '../app/views/partials/menu.php';
?>
<div class="container">
    <div class ="row">
        <div class ="col-4">
        <br/>
        <br><br>
<?php if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) : ?>

<?php for ($i = 0; $i < 200; $i++) {
        echo "<br>test<br>";
} ?>
<?php else: ?>
    <?php header("Location: /njens16/mvc/public/user/login");?>
<?php endif; ?>
        </div>
    </div>
</div>
<?php include '../app/views/partials/foot.php'; ?>

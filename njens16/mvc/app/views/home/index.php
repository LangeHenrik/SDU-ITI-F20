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
        </div>
        <div class = "col-4">
        <br>
        <form action="/njens16/mvc/public/user/login" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="passwod" name="password">
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
<?php endif; ?>
        </div>
    </div>
</div>
<?php include '../app/views/partials/foot.php'; ?>

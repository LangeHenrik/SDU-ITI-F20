<?php 
include "../app/views/partials/head.php"; 
include '../app/views/partials/menu.php';
?>
<div class="container">
    <div class ="row">
        <div class = "col-4">
        <br>
        </div>
        <div class = "col-4">
        <br>
        <?php if ($viewbag["errMsg"] == "Wrong username or password"): ?>
        <div id="error" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong><?=$viewbag["errMsg"]?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>
        <?php if ($viewbag["succsessMsg"] == "User created successfully"): ?>
        <div id="error" class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong><?=$viewbag["succsessMsg"]?></strong>
            <br> You can now login 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>



        <form action="/njens16/mvc/public/user/login" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="passwod" name="password">
            </div>
        <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
    </div>
</div>


<?php include '../app/views/partials/foot.php'; ?>

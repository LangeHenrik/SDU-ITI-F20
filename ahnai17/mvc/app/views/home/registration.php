<?php include '../app/views/partials/header.php';
?>
<form custom-nav-collapse-show" method="post" action="/ahnai17/mvc/public/Home/registration">
    <div class="form-group">
                    <label for="inputname">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="inputpassword">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkform" required>
                </div>
                <button type="submit" class="btn btn-primary">Log in</button>
                <a href="/ahnai17/mvc/public/home/login" class="btn btn-primary">Login</a>
</form>
<?php include '../app/views/partials/foot.php'; ?>

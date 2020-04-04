<?php include '../app/views/partials/menu.php'; ?>

<form id="loginForm" enctype="multipart/form-data">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        <small id="loginInfo" class="form-text text-muted"></small>
    </div>
    <button type="button" class="btn btn-primary" id="loginButton" name="loginButton">Login</button>
    <a class="btn btn-primary" href="/kivin18/mvc/public/home/register">Register</a>
</form>

<?php include '../app/views/partials/foot.php'; ?>

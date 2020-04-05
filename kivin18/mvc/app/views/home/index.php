<?php include '../app/views/partials/menu.php'; ?>

<form id="loginForm" method="post" action="/kivin18/mvc/public/home/login">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
        <small id="loginInfo" class="form-text text-muted"></small>
    </div>
    <button type="submit" class="btn btn-primary" id="loginButton" name="loginButton">Login</button>
    <a class="btn btn-primary" href="/kivin18/mvc/public/home/registerpage">Register</a>
</form>
<?php if (isset($viewbag['user_info'])) {
    echo $viewbag['user_info'];
} ?>

<?php include '../app/views/partials/foot.php'; ?>

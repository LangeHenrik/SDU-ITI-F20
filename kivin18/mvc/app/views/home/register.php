<?php include '../app/views/partials/menu.php'; ?>
<div class="pb-2 mt-4 mb-2 border-bottom">
    <h1>Register</h1>
</div>
<form method="post" action="/kivin18/mvc/public/home/register">
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" onkeyup="checkUsername()">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <a class="btn btn-primary" href="/kivin18/mvc/public/home/">Cancel</a>
    <small id="usernameInfo" class="form-text text-muted"></small>
</form>
<?php if (isset($viewbag['user_info'])) {
    echo $viewbag['user_info'];
} ?>

<?php include '../app/views/partials/foot.php'; ?>

<?php include '../app/views/partials/menu.php'; ?>

    <form method="post" action="/kivin18/mvc/public/home/login">
        <div class="form-group">
            <label for="username">Email address</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            <small id="usernameInfo" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a class="btn btn-primary" href="/kivin18/mvc/public/user/logout">Register</a>
    </form>
<?php include '../app/views/partials/foot.php'; ?>

<?php include '../app/views/partials/menu.php'; ?>


<div class="login-wrapper">
    <h1>Login</h1>

    <form method="POST" action="/siped18-timch15/mvc/public/home/login">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="<?= $viewbag['username'] ?? '' ?>" />
        <br />
        <label for="password">Password&nbsp;</label>
        <input type="password" name="password" id="password" />
        <br />
        <br />
        <input type="submit" name="submit" id="submit" />
        <p class="login-error" id="login-error"><?= $login_error ?? '' ?></p>

    </form>
</div>


<?php include '../app/views/partials/foot.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>

<div class="wrapper">
    <div class="content">

        <div class="login-wrapper">
            <h1>Login</h1>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $login_name ?? '' ?>" />
                <br />
                <label for="password">Password&nbsp;</label>
                <input type="password" name="password" id="password" />
                <br />
                <br />
                <input type="submit" name="submit" id="submit" />
                <p class="login-error" id="login-error"><?= $login_error ?? '' ?></p>

            </form>
        </div>

    </div>
</div>

<?php include '../app/views/partials/foot.php'; ?>
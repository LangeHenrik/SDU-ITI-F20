<?php include_once '../app/views/partials/header.php'; ?>
<div class="wrapper">
    <div class="content">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Login</h1>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="username" placeholder="Username" class="form-control" value="">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" placeholder="Password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <a>Not registered? <a id="createaccount" href="registration.php">Create an Account now!</a></a>
            <button type="submit" class="btn btn-primary" value="Login">Log In</button>
        </form>
    </div>
</div>
<div class="wrapper">
    <div class="content">
        <form action="home/login" method="POST">
            <h1>Login</h1>
            <div class="form-group">
                <input type="text" name="username" placeholder="Username" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <a>Not registered? <a id="createaccount" href="register">Create an Account now!</a></a>
            <button type="submit" class="btn btn-primary" value="Login">Log In</button>
        </form>
    </div>
</div>
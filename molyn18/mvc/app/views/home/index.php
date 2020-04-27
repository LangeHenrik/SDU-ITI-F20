<?php include '../app/views/partials/head.php';
echo false == 1;
?>
    <div class="box">
        <h1>Login</h1>
        <form action="#" id="login" method="post">
                <input type="text" name="username" placeholder="Username" autocomplete="username" autofocus>
                <input type="password" name="password" placeholder="Password" autocomplete="current-password">
                <br/>
                <button class="form-button" type="submit"><span>Login</span></button>
        </form>
        <p id="error"></p>
        <a href="/molyn18/mvc/public/Home/register">No account?</a>
    </div>
    <script src="/molyn18/mvc/public/js/login.js"></script>
<?php include '../app/views/partials/foot.php'; ?>
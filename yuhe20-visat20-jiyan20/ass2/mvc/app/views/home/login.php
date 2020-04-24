<?php include '../app/views/partials/menu.php'; ?>


<div class="login-info">
    <div class="text">
        <form name="login" method="POST" action="/yuhe20-visat20-jiyan20/ass2/mvc/public/User/login">
            <div class="log-in-form">
                <fieldset>
                    <legend>log-in Info</legend>
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="username" autofocus required>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="password" required>
                    <input type="submit" name="submit" id= "submit" value="Login" >
                </fieldset>
            </div>
            <hr>
            <p >New here? <a href="/yuhe20-visat20-jiyan20/mvc/public/User/register">Register</a>!</p>
            
        </form>
    </div>
</div>

<?php include '../app/views/partials/foot.php'; ?>
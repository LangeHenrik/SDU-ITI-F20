<?php
$title = "Login page";
include '../app/views/partials/menu.php';

?>
    <style>
        <?php include '../../css/style.css'; ?>
    </style>


    <div class="grid-container">
        <div class="login1">
            <h1><?php echo 'Log in or sign up via the Registration button' ?></h1>
        </div>
        <div class="login2" id="loginView">
            <!-- Login -->
            <form onsubmit="return" method="post">
                <p> Username: <input type="text" name="username" id="usernameId" placeholder="Username"></p><br>
                <p> Password: <input type="password" name="password" id="passwordId" placeholder="Password"></p><br>
        </div>
        <div class="login3">
            <input type="submit" class="button" name="send" value="Login" id="loginBtn">
        </div>
        </form>
        <div class="login4">
            <button class="button" onclick="window.location.href = '/Assignment1/mvc/public/register';">Register here</button>
        </div>
    </div>

<br/>
<!--You are now logged in!
<br><br>
<form method="POST" action="/Exercises/mvc/public/home/logout">
	<input type="submit" value="log out"/>
</form>-->


<?php include '../app/views/partials/foot.php'; ?>
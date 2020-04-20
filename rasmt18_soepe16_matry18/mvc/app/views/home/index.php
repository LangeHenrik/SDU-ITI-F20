<?php include '../app/views/partials/menu.php'; ?>
<div class="content">
    <div class="jumbotron bg-white">
        <h1 class="display-4">ITI - Assignment 2</h1>
        <p>Group Members</p>
        <ul>
            <li>Mathias Tryggedsson</li>
            <li>Rasmus Thomsen</li>
            <li>Søren Pedersen</li>
        </ul>
        <hr>
        <b>Login credentials for Henrik</b>
        <br>
        <b>Username: username</b>
        <br>
        <b>Password: Passw0rd</b>
        <hr>
        <form name="login" method="POST" action="/rasmt18_soepe16_matry18/mvc/public/Home/login">
            <div class="form-group">
                <fieldset>
                    <legend>Please enter your credentials to login</legend>
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" placeholder="Please input your username" autofocus autocomplete="off" required>
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Please input your password" required>
                    <br>
                    <input class="btn btn-primary" type="submit" name="submit" id= "submit" value="Login" >
                </fieldset>
            </div>
            <?php if(isset($viewbag['danger'])) 
            {
                ?>
                <div class="alert alert-danger alert-dismissible" fade show role="alert">
                    <?= $viewbag['danger'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }?>
            <hr>
            <p class="text-info">Don't have an account yet, don't worry. Just enter the registration page in the link below</p>
            <a href="/rasmt18_soepe16_matry18/mvc/public/Home/register">Registration page</a>
        </form>
    </div>
</div>

<?php include '../app/views/partials/foot.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>
    <div class="content">
        <h1>ITI - Assignment 2</h1>
        <p>Group Members</p>
        <ul>
            <li>Mathias Tryggedsson</li>
            <li>Rasmus Thomsen</li>
            <li>Søren Pedersen</li>
        </ul>
        <b>Login credentials for Henrik</b>
        <br>
        <b>Username: username</b>
        <br>
        <b>Password: Passw0rd</b>

        <form class="login" name="login" method="POST" action="/rasmt18_soepe16_matry18/mvc/public/Home/login">
            <fieldset>
                <legend>Please enter your credentials to login</legend>
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" autofocus autocomplete="off" required>
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" required>
                <br>
                <input class="btn btn-primary"type="submit" name="submit" id= "submit" value="Login" >
            </fieldset>
        </form>
        <p>Don't have an account yet, don't worry. Just enter the registration page in the link below</p>
        <a href="registration.php">Registration page</a>
        </form>
    </div>

<?php include '../app/views/partials/foot.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>

    <div class="content" id="registration">
        <div class="jumbotron bg-white">
            <h1>Registration</h1>
            <form onKeyUp="return checkFields()" method="POST" action=>
            <div class="form-group">
                <fieldset>
                    <legend>Registration for system:</legend>
                    <label for = "username">Username: </label>
                    <p class="text-danger" id="usernameStatus"> </p>
                    <input class="form-control" type="text" name="username" id="username" placeholder="Write username here" autofocus required>
                    <label for = "password">Password: </label>
                    <p class="text-danger" id="passwordStatus"> </p>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Write password here" required >
                    <label for = "password2">Retype password: </label>
                    <p class="text-danger" id="password2Status"> </p>
                    <input class="form-control" type="password" name="password2" id="password2" placeholder="Write password again" required >
                    </div>
                <input class="btn btn-primary" type="Submit" name="submit" value="Register" id="submit" disabled>
                </fieldset>
            </form>
            <div class="response" id="response">
                <h3><?= $viewbag['response'] ?></h3>     
            </div>
            <hr>
            <p class="text-info">If you are having trouble registering, please contact support.</p>
            <br>
        </div>

<?php include '../app/views/partials/foot.php'; ?>
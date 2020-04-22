<?php include '../app/views/partials/menu.php'; ?>

<div class="content" id="registration">
    <div class="jumbotron bg-white">
        <h1>Registration</h1>
        <form onKeyUp="return checkFields()" method="POST" action=>
            <div class="form-group">
                <fieldset>
                    <legend>Registration for system:</legend>
                    <label for = "username">Username: </label>
                    <input class="form-control" type="text" name="username" id="username" placeholder="Write username here" maxlength="24" autofocus required>
                    <p class="text-danger" id="usernameStatus"> </p>
                    <label for = "password">Password: </label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Write password here" required >
                    <p class="text-danger" id="passwordStatus"> </p>
                    <label for = "password2">Retype password: </label>
                    <input class="form-control" type="password" name="password2" id="password2" placeholder="Write password again" required >
                    <p class="text-danger" id="password2Status"> </p>
                    <br>
                    <input class="btn btn-primary" type="Submit" name="submit" value="Register" id="submit" disabled>
                </fieldset>
            </div>
        </form>
            <?php if(isset($viewbag['succes'])) 
            {
                ?>
                <div class="alert alert-success alert-dismissible" fade show role="alert">
                    <?= $viewbag['succes'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            } elseif(isset($viewbag['danger'])) 
            { ?>
                <div class="alert alert-danger alert-dismissible" fade show role="alert">
                    <?= $viewbag['danger'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }?>
        <hr>
        <p class="text-info">If you are having trouble registering, please contact support.</p>
        <br>
    </div>
</div>
<?php include '../app/views/partials/foot.php'; ?>
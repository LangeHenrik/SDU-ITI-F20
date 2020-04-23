<?php include '../app/views/partials/menu.php';?>

    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>
        <div class="form_div">
            <h2>Welcome <?php echo $_SESSION['username'];?></h2>
            <form method="POST" action="../public/user/logout">
                <input type="submit" value="Log out"/>
            </form>
        </div>
    <?php } else { ?>
        <div class="form_div">
            <form  method="POST" action="../public/user/login">
                <legend>Login:</legend>

                <label for="input_username">Username:</label>
                <input type="text" id="input_username" name="input_username"></input>
                </br>
                <label for="input_password">Password:</label>
                <input type="password" id="input_password" name="input_password"></input>
                </br>
                <input type="submit" value="Login">
            </form>
            <?php if (isset($login_message)) {?>
                <p class="error_message"><?php echo $login_message;?></p>
            <?php } ?>
            </br>
            <a href="registration.php"><button>Register</button></a>
        </div>
    <?php }?>

<?php include '../app/views/partials/foot.php'; ?>
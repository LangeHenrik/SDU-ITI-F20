<?php include '../app/views/partials/menu.php'; ?>

    <div class="form_div">
        </br>
        <form method="POST" action="../public/user/register">
            <legend>Register new user:</legend>

            <label for="input_username">Create username:</label>
            <input type="text" id="input_username" name="input_username" pattern="[\da-zA-Z]{5,12}"></input>
            </br>
            <p class="requirements">Username must have at least 5 alphanumeric characters and maximum 12.</p>
            </br>
            <label for="input_password">Create password:</label>
            <input type="password" id="input_password" name="input_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"></input>
            </br>
            <p class="requirements">Password must have at least 8 characters including a number, a lower case, and an upper case.</p>
            </br>
            <input type="submit" value="Register">
            <?php if (isset($info_message)) {?>
                <p class="error_message"><?php echo $info_message;?></p>
            <?php } ?>
        </form>
    </div>

<?php include '../app/views/partials/foot.php'; ?>
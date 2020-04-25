<?php
$title = "Register new user";
?>
<div class="register1" id="registerView">
    <text id="usernameAvailable" name="usernameAvailable"></text><br>
    <form method="post">
        <p> Username: (Max 100 chars)<input type="text" placeholder="Enter Username" name="regUsernameId" id="regUsernameId"
                                            required onkeyup="checkUsername(this.value)" onkeydown="checkRegister()"></p><br>
        <p> Password: (Max 100 chars) <input type="password" placeholder="Enter Password" name="regPassId" id="regPassId"
                                             required></p><br>

        <input type="submit">
    </form>
</div>

<?php
$title = "Register new user";
include '../app/views/partials/menu.php';
?>
<div class="register1" id="registerView">
    <text id="usernameAvailable" name="usernameAvailable"></text><br>
    <form onsubmit="return CheckForm()" method="post">
        <p> Username: (Max 100 chars)<input type="text" placeholder="Enter Username" name="regUsernameId" id="regUsernameId"
                                            required onkeyup="checkUsername(this.value)" onkeydown="checkRegister()"></p><br>
        <p class="info-elements" id="username-availability"></p>
        <p class="info-elements" id="username-info"></p> <br>
        <p> Password: (Max 100 chars) <input type="password" placeholder="Enter Password" name="regPassId" id="regPassId"
                                             required></p><br>
        <p class="info-elements" id="password-info"></p>
        <button type="submit">Register new user</button><br>
    </form>
</div>

<script src="/mvc/public/js/NameAvailability.js"></script>
<script src="/mvc/public/js/registercheck.js"></script>
<?php include '../app/views/partials/foot.php'; ?>

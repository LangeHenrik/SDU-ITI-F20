<?php
include '../app/views/partials/menu.php';
?>
<script src="/js/NameAvailability.js"></script>
<script src="/js/registercheck.js"></script>
<style>
    <?php include '../../css/style.css'; ?>
</style>


<div class="grid-container">
    <div class="login1">
        <h1><?php echo 'Please enter your wanted Username and Password' ?></h1>
    </div>
    <div class="register1" id="registerView">
        <text id="usernameAvailable" name="usernameAvailable"></text><br>
        <form onsubmit="return CheckForm()" action="../app/views/home" method>
            <p> Username: (Max 100 chars)<input type="text" placeholder="Enter Username" name="regUsernameId" id="regUsernameId"
                                                required onkeyup="CheckUsername(this.value)" onkeydown="CheckRegister()"></p><br>
            <p class="info-elements" id="username-availability"></p>
            <p class="info-elements" id="username-info"></p> <br>
            <p> Password: (Max 100 chars) <input type="password" placeholder="Enter Password" name="regPassId" id="regPassId"
                                                 required></p><br>
            <p class="info-elements" id="password-info"></p>
            <button class="button" type="submit"> Register new user</button><br>
        </form>
    </div>
</div>



<?php include '../app/views/partials/foot.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>



<h2>Register User</h2>

<form onsubmit="return checkform()" method="POST" action="/siped18-timch15/mvc/public/registration/registerUser">
    <label for="username">Username - <small>Only letters, numbers, and underscore allowed.</small></label>
    <br>
    <input type="text" name="username" id="username" />
    <i id="usernameIsValidIcon" class="fas fa-lg"></i>
    <p class="text-danger" id="nameinfo"><?= $viewbag['registerSuccess'] ?? '' ?></p>
    <label for="password">Password - <small>Must be at least 8 characters long with at least 1 lowercase and 1 uppercase.</small></label>
    <br>
    <input type="password" name="password" id="password" />
    <i id="passwordIsValidIcon" class="fas fa-lg"></i>
    <br>
    <br>
    <input type="submit" name="submit" id="submit" />
    <p class="text-danger" id="submitinfo"></p>
</form>


<script src="/siped18-timch15/mvc/public/js/validation.js"></script>
<?php include '../app/views/partials/foot.php'; ?>
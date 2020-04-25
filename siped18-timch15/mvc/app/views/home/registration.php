<?php include '../app/views/partials/menu.php'; ?>



<h2>Register User</h2>

<form onsubmit="return checkform()" method="POST" action="/siped18-timch15/mvc/public/registration/registerUser">
    <label for="username">Username - </label>
    <label for="username" class="constraints">Only letters, numbers, and underscore allowed.</label>
    <br>
    <input type="text" name="username" id="username" />
    <i id="usernameIsValidIcon" class="fas fa-lg"></i>
    <p class="info" id="nameinfo"><?= $viewbag['registerSuccess'] ?? '' ?></p>
    <br>
    <br>
    <label for="password">Password - </label>
    <label for="password" class="constraints">Must be at least 8 characters long with at least 1 lowercase and 1 uppercase.</label>
    <br>
    <input type="password" name="password" id="password" />
    <i id="passwordIsValidIcon" class="fas fa-lg"></i>
    <br>
    <br>
    <input type="submit" name="submit" id="submit" />
    <p class="info" id="submitinfo"></p>
</form>


<script src="/siped18-timch15/mvc/public/js/validation.js"></script>
<?php include '../app/views/partials/foot.php'; ?>
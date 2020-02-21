<?php
$title = "Create new user";
include_once 'Shared/Navbar.php';
?>
<div class="center-container">
    <form onsubmit="return checkform();" action="" method="post">
        <label for="email">Email</label> <br>
        <input type="email" name="email" id="email"/> <br>
        <p class="info" id="email-info"></p>

        <label for="password">Password</label> <br>
        <input type="text" name="password" id="password"/> <br>
        <p class="info" id="password-info"></p>

        <label for="password">Please repeat the password</label> <br>
        <input type="text" name="password" id="second-password"/> <br>
        <p class="info" id="second-password-info"></p>

        <label for="username">Username</label> <br>
        <input type="text" name="username" id="username"/> <br>
        <p class="info" id="username-info"></p>

    </form>
</div>

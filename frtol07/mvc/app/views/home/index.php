<?php include '../app/views/partials/menu.php'; ?>
<div class="container">
    <form name="formLogin" method="post" action="/frtol07/mvc/public/home/index">
<!--        <form name="formLogin" method="post" action="index">-->
        <label for="username" class="label">Username </label>
        <br>
        <input type="text" name="loginUsername" id="name" class="inputbox"/>
        <br>
        <label for="password" class="label">Password</label>
        <br>
        <input type="password" name="loginPassword" id="password" class="inputbox"/>
        <br><br>

        <input type="submit" name="submit" id="submit" value="Login" class="bigBtn"/>
    </form>
</div>

<div class="container">
    <label class="label"> Click here to register:</label>
    <br><br>
</div>

<div class="container">
        <a href="/frtol07/mvc/public/home/registerUserView">
<!--    <a href="registerUserView">-->
        <button class="bigBtn">Register</button>
    </a>
</div>


<?php include '../app/views/partials/foot.php'; ?>

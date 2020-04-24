<?php include '../app/views/partials/header.php'; ?>
<div>
    <h3 id="popUp"><?php if (isset($viewbag["response"])) {
                    echo $viewbag['response'];
                  } ?></h3>
</div>
<div class="wrapper">
    <div class="content">
        <form action="/kaseb18frhaa18/mvc/public/Register/registration" method="post">
            <h1>Registration</h1>
            <input placeholder="Name" type="text" name="name" id="name" required onkeyup="return checkName()" />
            <span id="name_err"></span>
            <input placeholder="Username" type="text" name="username" id="username" required
                onkeyup="return checkUserName()" />
            <span id="username_err"></span>
            <input placeholder="Password" type="password" name="password" id="password" required
                onkeyup="return checkPassword()" />
            <span id="password_err"></span>
            <button type="submit" name="register" class="btn btn-primary" value="Register">Register Now</button>
        </form>
    </div>
</div>
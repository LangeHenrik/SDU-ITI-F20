<?php include_once '../partials/header.php'; ?>
<div class="wrapper"><?php include '../partials/header.php'; ?>
    <div class="content">
      <form method="post">
        <h1>Registration</h1>
        <input placeholder="Name" type="text" name="name" id="name" onblur="return checkName()" />
        <span id="name_err"></span>

        <input placeholder="Username" type="text" name="username" id="username" onblur="return checkUserName()" />
        <span id="username_err"></span>

        <input placeholder="Password" type="password" name="password" id="password" onblur="return checkPassword()" />
        <span id="password_err"></span>

        <button type="submit" name="register" class="btn btn-primary" value="Register">Register Now</button>
      </form>

    </div>
  </div>
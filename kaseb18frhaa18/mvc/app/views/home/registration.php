<?php include '../app/views/partials/header.php'; ?>
<div class="wrapper">
  <div class="content">
    <form action="Register/registration" method="post">
      <h1>Registration</h1>
      <input placeholder="Name" type="text" name="name" id="name" onblur="return checkName()" />
      <input placeholder="Username" type="text" name="username" id="username" onblur="return checkUserName()" />
      <input placeholder="Password" type="password" name="password" id="password" onblur="return checkPassword()" />
      <button type="submit" name="register" class="btn btn-primary" value="Register">Register Now</button>
    </form>
  </div>
</div>
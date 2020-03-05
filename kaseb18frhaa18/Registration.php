<!DOCTYPE html>
<html>

<head>
  <title>Title of the document</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="RegexInputChecker.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<!--Comment-->

<body>

  <div class="wrapper">
    <div class="menu">
      <h2>Menu</h2>
      <ul>
        <li> <a href=frontpage.php>Login</a></li>
        <li> <a href=registration.php>Register</a></li>
        <li> <a href=>Upload</a></li>
        <li> <a href=imagefeed.php>Image Feed</a></li>
        <li> <a href=user_list.php>User List</a></li>
      </ul>
    </div>
  </div>
  
  <div class="wrapper">
    <div class="content">
      <form method="post">
        <h1>Registration</h1>

        <input placeholder="Name" type="text" name="name" id="name" onblur="return checkName()" />
        <label for="name" id="okName"></label>

        <input placeholder="Username" type="text" name="username" id="username" onblur="return checkUserName()" />
        <label for="username" id="okUserName"></label>
     
        <input placeholder="Password" type="password" name="password" id="password" onblur="return checkPassword()" />
        <label for="password" id="okPassword"></label>

        <button type="submit" name="register" class="btn btn-primary" value="Register">Register Now</button>
      </form>

    </div>
  </div>
</body>

</html>

<?php
require 'database.php';

if (isset($_POST['register'])) {
  $_POST['ok_signal'] = true;
  $name = check_name();
  $username = check_username();
  $password = check_password();
  if ($_POST['ok_signal']) {
    $password = password_hash($password);
    $statement = 'INSERT INTO person (name, username, passwordHash) VALUES (:name, :username, :password)';
    $parameters = array(array(":name", $name), array(":username", $username), array(":password", $password));
    talkToDB($statement, $parameters);
    echo ("it works");
  }
}

function check_name()
{
  if (empty($_POST["name"])) {
    $_POST['ok_signal'] = false;
  } else {
    $name = filter_var(($_POST["name"]), FILTER_SANITIZE_STRING);
    // check name
    if (!preg_match("/^[a-z ,.'-]+$/i", $name)) {
      $_POST['ok_signal'] = false;
    }
    return $name;
  }
}
function check_username()
{
  if (empty($_POST["username"])) {
    $_POST['ok_signal'] = false;
  } else {
    $username = filter_var(($_POST["username"]), FILTER_SANITIZE_STRING);
    // check username
    if (!preg_match("/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/", $username)) {
      $_POST['ok_signal'] = false;
    }
    return $username;
  }
}
function check_password()
{
  if (empty($_POST["password"])) {
    $_POST['ok_signal'] = false;
  } else {
    $password = filter_var(($_POST["password"]), FILTER_SANITIZE_STRING);
    // check password
    if (!preg_match("^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$", $password)) {
      $_POST['ok_signal'] = false;
    }
    return $password;
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
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
        <li> <a href=index.php>Login</a></li>
        <li> <a href=registration.php>Register</a></li>
        <li> <a href=UploadPage.php>Upload</a></li>
        <li> <a href=imagefeed.php>Image Feed</a></li>
        <li> <a href=user_list.php>User List</a></li>
        <form method="POST">
          <button name="logout" type="logout" value="logout">Log out</button>
        </form>
      </ul>
    </div>
  </div>

  <div class="wrapper">
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
</body>

</html>

<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  echo '<h3 id="name">' . $_SESSION["name"] . '</h3>';
  $loggedin = true;
}

require 'database.php';

if (isset($_POST['register'])) {
  $_POST['ok_signal'] = true;
  $name = check_input($_POST["name"], "/^[a-z ,.'-]+$/i");
  $username = check_input($_POST["username"], "/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/");
  $password = check_input($_POST["password"], "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/");
  if ($_POST['ok_signal']) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $statement = 'INSERT INTO person (name, username, passwordHash) VALUES (:name, :username, :password)';
    $parameters = array(array(":name", $name), array(":username", $username), array(":password", $password));
    $inserted = talkToDB($statement, $parameters);
    if (!$inserted){
      '<script>alert("Username already taken")</script>';
    }
    else{
    echo '<script>alert("Registration Success")</script>';
    }
  } else {
    echo '<script>alert("Registration not Success. Try again.")</script>';
  }
}

function check_input($input, $regex)
{
  $input = trim($input);
  if (!empty($input) and $_POST['ok_signal']) {
    $input = filter_var($input, FILTER_SANITIZE_STRING);
    // check name
    if (!preg_match($regex, $input)) {
      $_POST['ok_signal'] = false;
    }
    return $input;
  } else {
    $_POST['ok_signal'] = false;
  }
}

if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("location: index.php");
}

?>
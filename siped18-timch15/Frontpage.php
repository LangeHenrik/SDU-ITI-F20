<?php
session_start();
require_once'db_config.php';
?>

<!DOCTYPE html>
<head>
    <title>Semester feed</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php
    $correct_username = "joe";
    $correct_password = "pass";

    $username = filter_var ( $_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var ( $_POST["password"], FILTER_SANITIZE_STRING);

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($username === $correct_username && $password === $correct_password) {
        $_SESSION['logged_in'] = true;
        header('location: Imagepage.php');
    } else {
        $_SESSION['logged_in'] = false;
        echo 'wrong username or password';
    }
  
?>
<div class="login-page">
  <div class="form">
    <form class="login-form">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <input type="submit" name="login" value="Login">
      <p class="message">Not registered? <a href="Registrationpage.php">Create an account</a></p>
    </form>
  </div>
</div>

</body>



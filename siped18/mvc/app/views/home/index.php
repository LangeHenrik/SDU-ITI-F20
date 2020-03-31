<?php 
    $menuFile = '/Users/signethuesenpedersen/Documents/SDU-ITI-F20/siped18/mvc/app/views/partials/menu.php'; 
    $userFile = '/Users/signethuesenpedersen/Documents/SDU-ITI-F20/siped18/mvc/app/models/User.php';
    include ($menuFile); 
    include ($userFile);
?>

<!DOCTYPE html>
<head>
    <title>Assignment 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    //retrives values from from.
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING); 
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING); 

    $stmt = $this->model('User')->login($username, $password);

    if (count($stmt) == 1) {
        $username = $row["username"];
        $uPassword = $row["uPassword"];

        if (password_verify($password, $uPassword)) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            header("Location: imagefeed.php");
        } else {
            $_SESSION['loggedIn'] = false;
            $errorMessage = "Wrong username or password";
        }
    }
} 
?>

<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <input type="submit" name="login" value="Login">
      <p class="errorMessage" id="errorMeesage"></p>
      <p class="message">Not registered? <a href="Registrationpage.php">Create an account</a></p>
    </form>
  </div>
</div>

<?php 
$footerFile = '/Users/signethuesenpedersen/Documents/SDU-ITI-F20/siped18/mvc/app/views/partials/footer.php'; 
include $footerFile; 
?>
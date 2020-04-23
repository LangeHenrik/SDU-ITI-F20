<?php include '../app/views/partials/menu.php'; ?>

<!DOCTYPE html>
<head>
    <title>Assignment 2</title>
    <link rel="stylesheet" type="text/css" href="/siped18/mvc/public/styles/style.css">
</head>

<body>

<div class="login-page">
  <div class="form">
    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="text" placeholder="username"/>
      <input type="password" placeholder="password"/>
      <input type="submit" name="login" value="Login">
      <p class="errorMessage" id="errorMeesage"></p>
      <p class="message">Not registered? <a href="/siped18/mvc/public/Register">Create an account</a></p>
    </form>
  </div>
</div>

<?php include '../app/views/partials/footer.php'; ?>
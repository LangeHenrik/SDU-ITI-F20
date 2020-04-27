<?php

include '../app/views/partials/newUserNav.php';

if (session_status() == PHP_SESSION_NONE ) {
	session_start();
}

?>

<!DOCTYPE html>

<script type="text/javascript" src="../js/validation.js"></script>
<link rel="stylesheet" href="/abtho16/mvc/public/content/css/login_Reg.css">

<body class="content">
<div class="wrapper">
<div class="loginForm">
<h2> Login to access the site </h2>
<form action="/abtho16/mvc/public/home/loginVal" method="post" name="loginForm" class="login" onsubmit="return validateForm(username.value, password.value);">
    <input type="text" class='loginField' name="username" placeholder="Enter your username" required>
	<br>
    <input type="password" class='loginField' name="password" placeholder="Enter your password" required>
	<br>
    <input type="submit" class='submit' value="Login">
</form>

</div>
</body>
</html>

<?php 
if(isset($_SESSION["error"])) {
	$error = $_SESSION['error'];
	echo "<span>$error</span>";
}
?>

<?php
unset($_SESSION["error"]);

?>

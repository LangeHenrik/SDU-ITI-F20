<?php

include '../app/views/partials/newUserNav.php';

?>

<!DOCTYPE html>

<script type="text/javascript" src="/abtho16/mvc/public/content/js/validation.js"></script>
<link rel="stylesheet" href="/abtho16/mvc/public/content/css/login_Reg.css">
<style>

</style>

<body>
<div class="registerForm">
<p class="label"> Please register here! </p>
<form action="/abtho16/mvc/public/user/registeruser" class="register" onsubmit="return validateUser(username.value, password.value, repeatPassword.value,
	firstname.value, lastname.value, zip.value, city.value, email.value, phonenumber.value);" method="post">
	<input type="text" class="registerField" name="username" title="Between 5 and 16 characters, no special characters." border="10px" placeholder="username" required>
	<br>
    <input type="password" class="registerField" name='password' title="Between 8 and 20 characters, must contain one uppercase & lowercase letter and one number. No special characters." placeholder="password" required>
	<br>
    <input type="password" class="registerField" name="repeatPassword" title='repeat the password' placeholder="repeat password" required>
	<br>
    <input type="text" class="registerField" name="firstname" title="Between 1 and 30 characters, no weird letters." placeholder="first name" required>
	<br>
    <input type="text" class="registerField" name="lastname" title="Between 1 and 30 characters, no weird letters." placeholder="last name" required>
	<br>
    <input type="text" class="registerField" name="zip" title="Four digit zip code" placeholder="zip code" required>
	<br>
    <input type="text" class="registerField" name="city" title="Between 1 and 30 characters" placeholder="city" required>
	<br>
    <input type="text" class="registerField" name="email" title="Email" placeholder="email" required>
	<br>
    <input type="text" class="registerField" name="phonenumber" title="8 digit phone number" placeholder="phone number" required>
	<br>
    <input type="submit" value="Submit" class="submit">
</form>

</body>


</html>

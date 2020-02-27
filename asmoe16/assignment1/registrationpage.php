<?php require 'db.php'?>

<?php
if (isset($_POST['registerbutton'])) {
	register($_POST['username'],$_POST['password']);
	echo "Registered";
}
?>


<form  method="post" accept-charset="utf-8">
	Register here!
	<br/>
	username
	<input type="text" name="username"/>
	<br/>
	password
	<input type="password" name="password"/>
	<br/>
	<input type="submit" value="Register" name="registerbutton" id="registerbutton"/>
</form>

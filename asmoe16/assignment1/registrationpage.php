<?php require 'db.php'?>

<?php
if (isset($_POST['registerbutton'])) {

	if ( (preg_match('/^[A-Za-z]\w*/',$_POST['username']) ) &&
			 (preg_match('/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)\w{8,}/',$_POST['password']) )) {
		

		$psw_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
		register($_POST['username'],$psw_hash);
		echo "Registered";
		die();
	}
	echo "Invalid username or password";
}
?>


<form  method="post" accept-charset="utf-8">
	Register here!
	<br/>
	username
	<input type="text" name="username" id="reg_username"/>
	<br/>
	password
	<input type="password" name="password" id="reg_password"/>
	<br/>
	<input type="submit" value="Register" name="registerbutton" id="registerbutton"/>
</form>

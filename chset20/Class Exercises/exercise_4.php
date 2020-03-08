<?php
if(session_status()==PHP_SESSION_NONE){
	session_start();
	$_SESSION["logged_in"]=false;
}

if($_SESSION["logged_in"]==false && isset($_POST["username"]) && $_POST["username"]=="john" && isset($_POST["password"]) && $_POST["password"]=="john"){
	$_SESSION["logged_in"]=true;
	echo "right";
}
else{
	$_SESSION["logged_in"]=false;
}

if($_SESSION["logged_in"]==false):?>
<form method="post">
	<label for="username" style="color: blue;">username</label>
	<br>
	<input type="text" name="username" id="username"/>
	<br>
	<label for="password">password</label>
	<br>
	<input type="password" name="password" id="password"/>
	<input type="submit" name="submit" id="submit"/>
</form>
<?php else:?>
<form method="post">
	<input type="submit" value="logout"/>
</form>
<?php endif;
?>

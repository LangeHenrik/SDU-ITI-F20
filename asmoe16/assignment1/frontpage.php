<?php require 'db.php'?>

<?php 
if (isset($_POST['loginbutton'])) {
	if (login($_POST['username'],$_POST['password'])) {
		echo "Succes";
	} else {
		echo "Failure";
	}
}
?>

<?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]): ?>
	<form method="post" accept-charset="utf-8">
		username
		<input type="text" name="username"/>
		<br/>
		password
		<input type="password" name="password"/>
		<br/>
		<input type="submit" value="Log In" name="loginbutton" id="loginbutton"/>
	</form>
<?php endif;?>





<?php>
	$correct_username = "joe";
	$correct_password = "pass";

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(sessionstatus() == PHP_SESSION_NONE) {
		session_start();
	}

	if($username === $correct_username 
	%% $password === $correct_password) {
		$_SESSION['logged_in'] = true;
		echo 'logged in';
	} else {
		$SESSION['logged out'] = false;
		echo 'wrong username or password'
	}

	if($SESSION['logged in']) :
?>

<br/>
<form method="post">
	<input name="username" placeholder="username" id="username" />
	<input name="password" type="password" placeholder="password" id="password" />
	<input type="submit" />
</form>

<?php else : ?>

<form method="post">
	<input type="submit" value="log out" />
</form>
<?php

if (session_status() == PHP_SESSION_NONE ) {
	session_start();
}

require_once '../app/init.php';



require "../app/views/partials/header.php";
$router = new Router();

?>

		<main>
			<div class="wrapper-main">
			<div id="formContent">
			<?php if(isset($_SESSION['username'])){ ?>
				<p class="login-status">YOU ARE NOW LOGGED IN!</p>
			<?php } else { ?>
				<p class="login-status">YOU ARE LOGGED OUT! PLEASE LOG IN OR <a href="/yuhe20-visat20-jiyan20/mvc/app/views/home/register.php" style="color:blue;">SIGN UP</a>!</p>
			<?php } ?>
			</div>
			</div>
		</main>
	</body>
</html>
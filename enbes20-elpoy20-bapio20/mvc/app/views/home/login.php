<!-- Login form -->
<div id="main-content" >
	<div class="container">
		<div class="title">LOGIN</br></div>
		<form method="post" action="<?= URL.'home/login' ?>">
			<div class="form">
			 <?php
		         if(isset($viewbag['error'])) {
		            echo '<p id="verif_fail">'.$viewbag['error']."</p>";
		         }
	         ?>
			  <label for="username"> </label>
				<input type="text" name="usernameCon" placeholder="Username"/> <br />

				<label for="password"> </label>
				<input type="password" name="passwordCon" placeholder="Password"/> <br />

				<input type="submit" class="btn" name="formConnexion" value="Connect"/> Create an account - <a href="<?= URL ?>home/register">Sign up </a> <br />

			</div>

		</form>
	</div>
</div>

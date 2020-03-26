<div id="main-content">
	<div class="container">
		<div class="title"><?= $viewbag['title']?></div>
		<form method="post" action="">
			<div class="form">
				<?php
	              if(isset($viewbag['error'])) {
	                 echo '<p id="verif_fail">'.$viewbag['error']."</p>";
	              }
	              if(isset($viewbag['success'])){
	                echo '<p id="verif_ok">'.$viewbag['success']."</p>";
	              }
		        ?>
				<label for="username"></label>
				<input type="text" name="username" placeholder="Username" value="<?php if(isset($username)) { echo $username; } ?>" /> <br />
				<label for="password"></label>
				<input type="password" name="password" placeholder="Password" /> <br />
				<label for="password2"></label>
				<input type="password" name="password2" placeholder="Retype password" /> <br />
				<label for="email"></label>
				<input type="email" name="email" placeholder="Email" value="<?php if(isset($email)) { echo $email; } ?>" /> <br />
				<input type="submit" class="btn" name="formRegistration" value="Subscribe" /> <br />
			</div>
		</form>
	</div>
</div>

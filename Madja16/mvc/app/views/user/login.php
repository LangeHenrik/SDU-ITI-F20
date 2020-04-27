<?php include '../app/views/partials/menu.php'; ?>

<!-- <br/>
You are now logged in!
<br><br>
<form method="POST" action="madja16/mvc/public/home/logout">
	<input type="submit" value="log out"/>
</form> -->

	<div class="container">
		<form class="form-horizontal" role="form" action="login" method="POST" name="loginForm" id="loginForm">
			<h2>Log in</h2>
			<div class="form-group">
				<label for="username" class="col-sm-3 control-label">Username</label>
				<div class="col-sm-9">
					<input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus>
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-3 control-label">Password</label>
				<div class="col-sm-9">
					<input type="password" name="password" id="password" placeholder="Password" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9">
					<button class="btn btn-primary" type="submit">Login</button>
				</div>
			</div>
		</form>
	</div>

<?php include '../app/views/partials/foot.php'; ?>
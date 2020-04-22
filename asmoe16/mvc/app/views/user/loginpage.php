<?php include '../app/views/partials/menu.php'; ?>

<!-- Login form -->
<form action="/asmoe16/mvc/public/user/login" method="post">
  <div class="form-group">
    <label for="username">Username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Username">
		<small id="usernameHelp" class="form-text text-muted" >
		</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		<small id="passwordHelp" class="form-text text-muted" >
		</small>
  </div>
	<button type="submit" class="btn btn-primary">
		Login
	</button>
</form>

<?php include '../app/views/partials/foot.php'; ?>

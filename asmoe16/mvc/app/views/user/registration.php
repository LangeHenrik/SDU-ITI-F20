<?php include '../app/views/partials/menu.php'; ?>

<!-- Choose boostrap class for helper text -->
<?php
$password_class = "form-text ";
$username_class = $password_class;
$password_class .= ( !(isset($viewbag['valid_password']) && !$viewbag['valid_password']) )? 
	"text-muted":"text-danger";
$username_class .= (
		!(isset($viewbag['valid_username']) && !$viewbag['valid_username'])
		&& 
		!(isset($viewbag['username_taken']) && $viewbag['username_taken'])
	)?"text-muted":"text-danger";
?>

<!-- Registration form -->
<form action="/asmoe16/mvc/public/user/register" method="post">
  <div class="form-group">
    <label for="username">Username</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="Username">
		<small id="usernameHelp" class="<?=$username_class?>" >
			<?php if (isset($viewbag['username_taken']) && $viewbag['username_taken']): ?>
				Username is taken.
			<?php elseif (isset($viewbag['valid_username']) && !$viewbag['valid_username']): ?>
				Username is not valid.
			<?php else: ?>
				Choose wisely.
			<?php endif; ?>
		</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		<small id="passwordHelp" class="<?=$password_class?>" >
			<?php if (isset($viewbag['valid_password']) && !$viewbag['valid_password']): ?>
				Password is not valid.
			<?php endif; ?>
		</small>
  </div>
	<button type="submit" class="btn btn-primary">
		Submit
	</button>
</form>

<?php include '../app/views/partials/foot.php'; ?>

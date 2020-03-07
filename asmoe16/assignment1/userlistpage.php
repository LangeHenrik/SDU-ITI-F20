<?php require 'login_guard.php';?>
<?php require 'db.php'; ?>

<?php foreach (list_users() as $user): ?>
	<div class="user">
		<?=$user['username']?>
	</div>
<?php endforeach; ?>

<?php include '../app/views/partials/menu.php'; ?>

<div class="container">
	<?php foreach ($viewbag['users'] as $user): ?>
		<div class="media">
			<div class="media-left">
				<img src="" alt="Placeholder"/>
			</div>
			<div class="media-body">
				<p><?=$user['username']?></p>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php include '../app/views/partials/foot.php'; ?>

<?php include '../app/views/partials/menu.php'; ?>
<?php if (isset($viewbag['images'])): ?>

<form action="/asmoe16/mvc/public/image/index/" method="get" accept-charset="utf-8">
	<select name="user-selector" id="user-selector">
		<option>All</option>
		<?php if (isset($viewbag['users'])): ?>
			<?php foreach ($viewbag['users'] as $user): ?>
				<option value="<?=$user['username']?>"><?=$user['username']?></option>
			<?php endforeach; ?>
		<?php endif; ?>
	</select>
	<button>Update</button>
</form>	

<div id="image_content" class="container">
	<?php require_once '../app/views/image/ajax.php'; ?>
</div>


<?php endif; ?>
<?php include '../app/views/partials/foot.php'; ?>

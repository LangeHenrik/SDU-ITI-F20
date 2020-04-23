<?php include '../app/views/partials/menu.php'; ?>
<?php if (isset($viewbag['images'])): ?>

<form action="/asmoe16/mvc/public/image/index/" method="get" accept-charset="utf-8">

	<select name="user" id="user">
		<option>All</option>
		<?php if (isset($viewbag['users'])): ?>
			<?php foreach ($viewbag['users'] as $user): ?>
				<option value="<?=$user['username']?>"><?=$user['username']?></option>
			<?php endforeach; ?>
		<?php endif; ?>
	</select>
	<button>Update</button>
</form>	

<div class="container">
	<?php foreach ($viewbag['images'] as $img): ?>
		<div class="media">
			<div class="media-left">
				<img src="/asmoe16/mvc/<?=$img['image_path']?>" alt="hej" class="img-rounded"
					style="width:100%;max-height:250;object-fit:contain"/>
			</div>
			<div class="media-body">
				<h4 class="media-heading"> <?=$img['header']?></h4>
				<p><b>Uploaded by:</b> <?=$img['username']?><br/>
				<?=$img['description']?></p>
			</div>
		</div>
		<hr/>
	<?php endforeach; ?>
</div>


<?php endif; ?>
<?php include '../app/views/partials/foot.php'; ?>

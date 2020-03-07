<?php require 'db.php'; ?>
<?php require 'login_guard.php'; ?>

<?php $images = list_images($_GET['q']); ?>

<?php foreach ($images as $img): ?>
<div class="img_feed">
	<h2> <?=$img['header']?></h2>
	<img src=<?=$img['image_path']?> alt="hej"/>
	<br></br>
	<b>Uploaded by:</b><?=$img['username']?>
	<br></br>
	<?=$img['description']?>
	<br></br>
</div>
<?php endforeach; ?>

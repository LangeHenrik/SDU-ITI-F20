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

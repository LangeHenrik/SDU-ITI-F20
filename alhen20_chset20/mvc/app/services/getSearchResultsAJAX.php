<?php
include '..\models\Picture.php';

if(session_status()==PHP_SESSION_NONE){
	session_start();
}

$query = htmlentities(filter_input(INPUT_GET, 'qry', FILTER_SANITIZE_STRING));

$pictureModel = new Picture();

$result = $pictureModel->getAllPictures();

if($query==""){
	$result = $pictureModel->getAllPictures();
}
else{
	$result = $pictureModel->getPictureByQuery($query);
}

foreach($result as $res):?>
	<div class="picture">
		<div class="header"><?= $res["header"] ?> <br/>by<br/> <?= $res["username"] ?></div>
		<img src="<?= $res["img"] ?>"/>
		<div class="description"><?= $res["description"] ?></div>
	</div>
	<br>
<?php endforeach; ?>

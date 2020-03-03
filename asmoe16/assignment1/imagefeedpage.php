<?php
require "db.php" 
$images = list_images();
?>

<?php foreach ($images as $img): ?>
	<img src=<?=$img['image_path']?> alt="hej"/>
<?php endforeach; ?>

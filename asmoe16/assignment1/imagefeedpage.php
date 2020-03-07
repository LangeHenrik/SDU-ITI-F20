<?php require 'login_guard.php';?>
<?php
require "db.php";
$images = list_images();
?>

<select name="user-image-selector" id="user-image-selector">
<option value="">All</option>

<?php foreach (list_users() as $user): ?>
	<option value=<?=$user['user_id']?>><?=$user['username']?></option>
<?php endforeach; ?>

</select>

<div id="image_content"/>


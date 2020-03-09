<?php 
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/upload.css">
</head>
<body>
<header>
<?php 
require "assets/php/header.php"
 ?>
 </header>



	<style type="text/css">
		body{
			background: url(img/lock.png);
		}
	</style>
		
	<div class="uploadbox">
		<img src="img/avatar.png" class="avatar" >
	<form action="upload.php" method="POST" enctype="multipart/form-data">
		<h1>Upload Image</h1>
		<input type="file" name="file">
		<button type="submit" name="submit">Upload</button>
	</form>
	</div>

</body>
</html>
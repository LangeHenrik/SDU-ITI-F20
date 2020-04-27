<?php

include '../app/views/partials/newUserNav.php';

?>

<!DOCTYPE html>
<head>
<link rel="stylesheet" href="/abtho16/mvc/public/content/css/login_Reg.css">
</head>

<body class="content">
<br>
<div class="uploadForm">
<div class="c">Upload</div>
<br><br>
<form method="post" enctype="multipart/form-data" action="/abtho16/mvc/public/picture/save">
	<input type="file" name="image" accept="image/gif, image/jpeg, image/png" name="image" placeholder="Choose an image" required>
	<br><br>
	<input type="text" name="header" class='field' placeholder="Enter your header" required>
	<br><br>
    <input type="text" name="description" class='field' placeholder="Enter a description">
	<br><br>
	<input type="submit" name="submit_image" class='submit'>
</form>
</body>
<?php include '../app/views/partials/foot.php'; ?>
</html>

<?php require 'login_guard.php';?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
		<br></br>
    <input type="file" name="fileToUpload" id="fileToUpload">
		<br></br>
		Title: <input type="text" value="" name="header"/>
		<br></br>
		Image description: <input type="text" value="" name="description"/>
		<br></br>
    <input type="submit" value="Upload Image" name="submit">
</form>

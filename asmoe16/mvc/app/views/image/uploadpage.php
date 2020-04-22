<?php include '../app/views/partials/menu.php'; ?>


<form action="upload.php" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="fileUpload"> Select image to upload</label>
    <input type="file" name="fileUpload" id="fileUpload">
	</div>
	<div class="form-group">
		<label for="header">Title</label>
		<input type="text" name="header"/>
	</div>
	<div class="form-group">
		<label for="description">Image description</label>
		<input type="text" name="description"/>
	</div>
	<button type="submit" class="btn btn-primary">Upload</button>
</form>

<?php include '../app/views/partials/foot.php'; ?>

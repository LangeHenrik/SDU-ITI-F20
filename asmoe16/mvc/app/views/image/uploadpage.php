<?php include '../app/views/partials/menu.php'; ?>


<form action="/asmoe16/mvc/public/image/upload" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="fileUpload"> Select image to upload</label>
    <input type="file" class="form-control-file" name="fileUpload" id="fileUpload">
		<?php if ( isset($viewbag['error']) ):
			$error =& $viewbag['error']; ?>
			<small id="inputHelp" class="form-text text-danger">
				<?php if (isset($error['image']) && !$error['image']): ?>
					File is not an image. Only gif, jpg and png are allowed.
				<?php endif; ?>
				<?php if (isset($error['size']) && !$error['size']): ?>
					File may not be greater then 1GB.
				<?php endif; ?>
				<?php if (isset($error['db']) && !$error['db']): ?>
					Something went wrong. Please try again later.
				<?php endif; ?>
			</small>
		<?php endif; ?>
	</div>
	<div class="form-group">
		<label for="header">Title</label>
		<input type="text" class="form-control form-control-lg" name="header"/>
	</div>
	<div class="form-group">
		<label for="description">Image description</label>
		<input type="text" class="form-control" name="description"/>
	</div>
	<button type="submit" class="btn btn-primary">Upload</button>
</form>

<?php include '../app/views/partials/foot.php'; ?>

<!-- header -->
<?php include "../app/views/partials/header.php"; ?>

<body>

	<!-- navigation bar -->
	<?php include "../app/views/partials/nav.php"; ?>

	<!-- content-->
	<section id="content">

		<div id="upload-container">

			<div id="upload-box">

				<? if (isset($data["error"])): ?>
				<div id="upload-error"><?=$data["error"]?></div>
				<? endif; ?>

				<form id="upload" method="POST" enctype="multipart/form-data">

					<label for="image">Select image to upload</label>
					<input type="file" name="image" accept="image/png, image/jpeg" onchange="uploadPreview(this)" required>

					<img name="img" id="preview" src="" alt="Upload preview" />

					<label for="title">Title</label>
					<input type="text" placeholder="Enter title" name="title" required>

					<label for="password">Description</label for="description">
					<textarea placeholder="Enter some description for the uploaded image (max 100)" name="description" maxlength="100" required></textarea>

				</form>

				<button type="submit" form="upload">Upload</button>
				<button type="cancel" onclick="location.href='<?=DIR_PUBLIC?>/feed/list'">Cancel</button>

			</div>

		</div>

	</section>

</body>

<!-- footer -->
<?php include "../app/views/partials/footer.php"; ?>
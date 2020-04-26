<?php include '../app/views/partials/menu.php'; ?>

<form action="/siped18-timch15/mvc/public/upload/uploadImage" method="post" enctype="multipart/form-data">
    <label for="fileToUpload">Select image to upload: </label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br />
    <label for="image-title">Image title: </label>
    <input type="text" name="image-title" id="image-title">
    <br />
    <label for="image-description">Image description: </label>
    <input type="text" name="image-description" id="image-description">
    <br />
    <input type="submit" value="Upload Image" name="submit">
    <p class="upload-error" id="upload-error"><?= $viewbag['errorMessage'] ?? '' ?></p>
    <p class="upload-success" id="upload-success"><?= $viewbag['successMessage'] ?? '' ?></p>
</form>


<?php include '../app/views/partials/foot.php'; ?>
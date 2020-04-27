<?php include '../app/views/partials/menu.php'; ?>

<form class="container center_div" action="/siped18-timch15/mvc/public/upload/uploadImage" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="fileToUpload">Select image to upload: </label>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div class="form-group">
        <label for="image-title">Image title: </label>
        <input type="text" name="image-title" id="image-title">
    </div>
    <div class="form-group">
        <label for="image-description">Image description: </label>
        <input type="text" name="image-description" id="image-description">
    </div>
    
    <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
    <p class="text-danger" role="alert" id="upload-error"><?= $viewbag['errorMessage'] ?? '' ?></p>
    <p class="text-success" role="alert" id="upload-success"><?= $viewbag['successMessage'] ?? '' ?></p>
</form>


<?php include '../app/views/partials/foot.php'; ?>
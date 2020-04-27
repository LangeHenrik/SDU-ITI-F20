<?php include '../app/views/partials/head.php'; ?>
<?php include '../app/views/partials/menu.php'; ?>



<div class="grid-container">
    <div class="preview">
        <div class="preview">
            <canvas id="myCanvas" width="500" height="500"">
                Your browser does not support the HTML5 canvas tag.
            </canvas>
        </div>
    </div>
    <div class="control">
        <form ENCTYPE="multipart/form-data" action="/molyn18/mvc/public/Home/imgUpload" method="POST">
            <div class="form-header">
                <h1>Upload Picture</h1>
            </div>
            <label for="title">Title:<br></label>
            <input type="text" name="title" maxlength="32" required>
            <br>
            <label for="description">Description:<br></label>
            <input type="text" name="description" maxlength="240" required>
            <br>
            <input type="file" id="imageUpload" name="image" required accept=".jpg,.jpeg,.png,.gif"/>
            <input type="hidden" id="dataURL" name="dataURL"/>
            <button id="imgUpload" type="submit"><span>Upload</span></button>
        </form>
    </div>
</div>
<script src="/molyn18/mvc/public/js/upload.js"></script>

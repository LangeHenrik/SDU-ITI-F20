<?php include_once '../app/views/partials/header.php';
?>
<div class="item">
        <div class="col-lg-6 mx-auto">
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4">
                    <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                    <small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
            </div>
    <p class="font-italic text-white text-center">The uploaded image will be shown here</p>
    <div class="image-area mt-4"><img id="imageResult"
    src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
        </div>
</div>
<script src="/ahnai17/mvc/public/js/show_image.js"></script>

<?php include_once '../app/views/partials/foot.php';


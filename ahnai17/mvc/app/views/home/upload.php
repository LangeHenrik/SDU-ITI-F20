<?php include_once '../app/views/partials/header.php';
?>
<div class="item">
    <div class="col-lg-6 mx-auto">
        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
            <form custom-nav-collapse-show" method="post" action="/ahnai17/mvc/public/home/upload" 
                enctype='multipart/form-data'>
                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4">
                    <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                    <small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title"
                    name="title" placeholder="Enter title of the image">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" 
                    placeholder="Enter image description">
                </div>
            </form>
        </div>
    <p class="font-italic text-white text-center">The uploaded image will be shown here</p>
        <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
            class="img-fluid rounded shadow-sm mx-auto d-block">
        </div>
    </div>
</div>
<script src="/ahnai17/mvc/public/js/show_image.js"></script>

<?php include_once '../app/views/partials/foot.php';


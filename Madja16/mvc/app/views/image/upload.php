<?php include '../app/views/partials/menu.php'; ?>

<div class="container">
    <form class="md-form" action="upload" method="POST" enctype="multipart/form-data">
    <div class="file-field">
        <div class="mb-4">
        <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
            class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">
        </div>
        <div class="d-flex justify-content-center">
            <div class="btn btn-mdb-color btn-rounded float-left">
                <span>Add image</span>
                <input type="file" class="form-control-file" name="imageUpload" id="imageUpload">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
                <input class="form-control" type="text" name="header" id="header" placeholder="header...">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
                <textarea class="form-control" name="description" id="description" rows="4" cols="50" placeholder="description"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-9">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </div>
    </form>
</div>

<?php include '../app/views/partials/foot.php'; ?>
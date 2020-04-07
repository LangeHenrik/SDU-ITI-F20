<?php include '../app/views/partials/menu.php'; ?>
    <div class="pb-2 mt-4 mb-2 border-bottom">
        <h1>Upload image</h1>
    </div>
    <div class="form-group" id="upload">
        <form id="uploadForm" method="post" enctype="multipart/form-data" action="/kivin18/mvc/public/home/addImage">
            <div class="form-group">
                <label class="lead" for="imageHeader">Title</label>
                <input type="text" class="form-control" name="imageHeader" id="imageHeader" maxlength="50" placeholder="Image title">
            </div>
            <div class="form-group">
                <label class="lead" for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Write a description here"></textarea>
            </div>
            <div class="form-group">
                <label class="btn btn-primary" for="image">Choose image</label>
                <small id="uploadInfo"></small>
                <input class="fileInput" type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Upload image</button>
            </div>
        </form>
    </div>

<?php include '../app/views/partials/foot.php'; ?>
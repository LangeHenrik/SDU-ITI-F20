<!DOCTYPE html>
<header>
    <title>Upload</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/upload_page_style.css">
    <script type='text/javascript' src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="../js/uploadUtility.js"></script>
    <html lang="en">
</header>

<body>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
        <?php include_once '../app/views/partials/menu.php'; ?>



        <div id="upload-picture-container" class="upload_picture_container">
            <h1>Upload page</h1>
            <form method="POST" action="/aldus17/mvc/public/user/upload" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title of the image here" required />
                    <br>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" class="form-control" maxlength="250" placeholder="Type a description to the image"></textarea>
                    <br>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Upload File</label>

                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Choose an image file or drag it here.</p>
                                    </div>
                                    <input type="file" name="imageToBeUploaded" id="imageToBeUploaded" class="dropzone" required>
                                </div>
                                <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <div><b>Preview</b></div>
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                    <i class="fa fa-times"></i> Remove image
                                                </button>
                                            </div>
                                        </div>
                                        <div class="box-body"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <p> The only allowed formats are "jpg", "jpeg", "png", "gif"</p>
                <input type="submit" name="uploadbtn" id="uploadbtn" class="uploadbtn" value="Upload image" />
            </form>

            <?php
            if (!empty($_SESSION['uploadMessage'])) {
                if ($_SESSION['uploadMessage'] == 1) {
                    echo '<h4>Uploaded picture successfully</h4>';
                } elseif ($_SESSION['uploadMessage'] == 2) {
                    echo '<h4> Error while uploading picture, picture must be either jpg, jpeg, png or gif format</h4>';
                }
            } else {
                echo '<h4>Please upload a picture</h4>';
            }
            ?>
        </div>
        

    <?php else : ?>

        <?php include_once '../app/views/partials/restricted.php'; ?>

    <?php endif; ?>
</body>

</html>
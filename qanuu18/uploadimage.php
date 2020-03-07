<?php include 'processForm.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="extfiles/styling.css">

    <title>uploadimage</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-4 form-div">
            <form action="uploadimage.php" method="post" enctype="multipart/form-data">

            <h3 class="text-center">Upload image</h3>

            <div class="form-group">
                <label for="profileimage">Profile image</label>
                <input type="file" name="profileImage" id="profileImage" class="form-control">
        </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea name="Description" id="Description" class="form-control"></textarea>
                    <div class="form-group">
                        <button type="submit" name = "upload-image" class="btnupload btnupload-primary btnupload-block">Upload Image</button>
                    </div>
                    <div class="form-group">
                    <label for="Header">Title for image</label>
                    <br>
                    <input type="text" name="Header" >
                    <div class="form-group">
                </div>
            </div>
            </form>

        </div>
    </div>
</div>
</body>

</html>
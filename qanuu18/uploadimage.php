<?php include 'processForm.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    
    <link rel="stylesheet" href="styling.css">

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
                    <label for="bio">Bio</label>
                    <textarea name="bio" id="bio" class="form-control"></textarea>
                    <div class="form-group">
                        <button type="submit" name = "upload-image" class="btnupload btnupload-primary btnupload-block">Upload Image</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>
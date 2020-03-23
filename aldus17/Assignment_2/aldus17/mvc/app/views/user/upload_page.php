<!DOCTYPE html>
<header>
    <title>Upload</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/upload_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">
</header>

<body>
    <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
        <?php include_once '../app/views/partials/menu.php'; ?>

        <div id="upload-picture-container" class="upload_picture_container">
            <h1>Upload page</h1>
            <form method="post" action="/aldus17/mvc/public/user/upload" enctype="multipart/form-data">
                <input type="text" name="title" id="title" class="title" placeholder="Enter title of the image here" required />
                <br>
                <textarea type="text" id="description" name="description" maxlength="250" placeholder="Type a description to the image"></textarea>
                <br>
                <div class="upload-btn-wrapper">
                    <button class="choosefilebtn">Choose image to upload</button>
                    <input type="file" id="imageToBeUploaded" class="imageToBeUploaded" name="imageToBeUploaded" required />
                </div>
                <br>
                <input type="submit" name="uploadbtn" id="uploadbtn" class="uploadbtn" value="Upload image" />
            </form>
        </div>

    <?php else : ?>



    <?php endif; ?>
</body>

</html>
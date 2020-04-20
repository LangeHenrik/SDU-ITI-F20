<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../app/views/partials/header.php'?>
    <title>Upload Image</title>
    <link rel="stylesheet" href="/rayou18_kalau17_jlaur13/mvc/public/styles/background.css">
</head>
<body>
<?php include "../app/views/partials/menu.php" ?>

<?php

?>

    <form action="/rayou18_kalau17_jlaur13/mvc/public/Upload/uploadPictures" method="POST" enctype = "multipart/form-data">
        <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input type="text" class="form-control" name="header" id="exampleInputTitle" aria-describedby="TitleHelp" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="exampleInputPicture">Picture</label>
            <input type = "file" class="form-control" id="file" name="file" placeholder="Picture" type="file">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description for picture:</label>
            <textarea cols="50" rows="6" name="description" id="description" value="" maxlength="250" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>






<?php include "../app/views/partials/foot.php" ?>
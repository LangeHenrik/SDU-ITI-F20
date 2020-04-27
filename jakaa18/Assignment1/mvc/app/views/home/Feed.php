<?php
$title = "Login page";
include '../app/views/partials/menu.php';

?>
    <style>
        <?php include '../../css/style.css'; ?>
    </style>


    <div class="grid-container2">
    <body onload="showHomeLink()">
<div class="header">
    <h1><?php echo 'Welcome to your homepage!' ?></h1>
</div>
<div class="homepage1">
    <ul>
        <li><a onclick="showHomeLink()" href="#" id="homelink">Home</a></li>
        <li><a onclick="showPhotoLink()" href="#" id="photolink">Upload Photos</a></li>
        <li><a onclick="showUsersLink()" href="#" id="userslink">Users</a></li>
        <li><a href="logout.php" id="logout">Logout</a></li>
    </ul>
</div>
<div class="homepage2" id="uploadForm">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload
        <input type="file" name="image" id="fileId">
        <input type="submit" name="imgSubmit" value="Upload" id="imgSubmit">
        <p> Header: <input type="text" name="header" id="header" required></p><br>
        <label for="description">Image description: Max 300 characters!</label><br>
        <textarea name="imgDescription" id="description" id="descriptionId" rows="4" cols="50" required></textarea>
    </form>
</div>
<div class="homepage2" name="Image_page" id="imagePage">
    <div class="image-container">

    </div>
</div>

<?php include '../app/views/partials/foot.php'; ?>
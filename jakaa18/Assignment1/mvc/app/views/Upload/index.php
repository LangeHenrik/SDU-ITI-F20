<?php
include '../app/views/partials/menu.php';
?>
    <style>
        <?php include '../../css/style.css'; ?>
    </style>
<?php
include '../app/views/partials/pagegrid.php';
include '../app/views/partials/sidebar.php';


?>
<div class="homepage2" id="uploadForm">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload
        <input type="file" name="image" id="fileId">
        <input type="submit" name="imgSubmit" value="Upload" id="imgSubmit">
        <p> Header: <input type ="text" name="header" id="header" required></p><br>
        <label for="description">Image description: Max 300 characters!</label><br>
        <textarea name="imgDescription" id="description" id="descriptionId" rows="4" cols="50" required></textarea>
    </form>
</div>


    Hello there, <?=$viewbag['username']?>

<?php include '../app/views/partials/foot.php'; ?>
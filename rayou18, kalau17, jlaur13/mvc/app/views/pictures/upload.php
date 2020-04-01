<?php include "../partials/header.php" ?>
<?php include "../partials/menu.php" ?>

<?php
if(POST){
    echo yes;
}
?>

    <form method="POST" enctype = "multipart/form-data">
        <div class="form-group">
            <label for="exampleInputTitle">Title</label>
            <input type="text" class="form-control" name="header" id="exampleInputTitle" aria-describedby="TitleHelp" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="exampleInputPicture">Picture</label>
            <input type="file" class="form-control" name="file" id="exampleInputPicture" placeholder="Picture">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Description for picture:</label>
            <textarea cols="50" rows="6" name="description" id="description" value="" maxlength="250" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<?php include "../partials/foot.php" ?>
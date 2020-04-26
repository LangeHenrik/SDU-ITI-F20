<?php include '../app/views/partials/header.php'; ?>
<div>
    <h3 id="popUp">
        <?php if (isset($viewbag['Response'])) {
            echo $viewbag['Response'];
        } ?>
    </h3>
</div>

    <div class="formContent" id="formContent">
        <b><h1>Upload Image</h1></b>
        <i><h2>Choose your pictures and upload here!</h2></i>
        <form method="post" action="/yuhe20-visat20-jiyan20/mvc/public/Upload/uploadpicture" enctype='multipart/form-data'>
            
            <input type="text" name="image-header" id="image-header" required placeholder="Name Your Image">
            
            <br>
            
            <textarea name="image-description" id="image-description" cols="30" rows="5" required placeholder="Write a Description for Your Image"></textarea>

            <input type="file" name="image-upload" id="image-upload" required>

            <button type="submit" value="upload" name="image-upload">Upload now!</button>
        </form>
    </div>
</body>

        
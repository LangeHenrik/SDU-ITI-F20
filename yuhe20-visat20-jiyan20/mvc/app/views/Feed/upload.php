<?php include '../app/views/partials/menu.php'; ?>
<div class="content" id="upload">

        <div class="formContent" id="formContent">
            <b><h1>Upload Image</h1></b>
            <i><h2>Choose your pictures and upload them here!</h2></i>
            <form action="/yuhe20-visat20-jiyan20/mvc/public/Image/upload" method="post" enctype="multipart/form-data">
                <label for="image">Choose Your Image</label>
                <br><input type="file" name="image-upload" id="image-upload"/><br>
                <label for="image-header">Image Header</label>
                <br><input type="text" name="image-header" id="image-header" placeholder="Write a Title for Your Image"><br>
                <label for="image-description" name="image-description" id="image-description">Image Description</label>
                <br><textarea name="image-description" id="image-description" cols="30" rows="5" placeholder="Write a Description for Your Image"></textarea><br>
                <button type="submit" value="upload" name="image-upload">UPLOAD</button>
            </form>
        </div>
        <?php if(isset($viewbag['succes'])) 
            {
                ?>
                <div class="alert alert-success alert-dismissible" fade show role="alert">
                    <?= $viewbag['succes'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            } elseif(isset($viewbag['danger'])) 
            { ?>
                <div class="alert alert-danger alert-dismissible" fade show role="alert">
                    <?= $viewbag['danger'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }?>
    </div>
</div>
<?php include '../app/views/partials/foot.php'; ?>
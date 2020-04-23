<?php include '../app/views/partials/menu.php'; ?>

<div class="form_div">
        <form method="POST" enctype="multipart/form-data" action="../public/image/upload_image">
            <legend>Upload image:</legend>

            <label for="input_img">Select image:</label>
            <input type="file" id="input_img" name="input_img"></input>
            </br>
            <label for="input_img_header">Header of the image:</label>
            <input type="text" id="input_img_header" name="input_img_header"></input>
            </br>
            <label for="input_img_description">Description of the image:</label></br>
            <!--<input type="text" id="input_img_header" name="input_img_header"></input>-->
            <textarea rows="3" cols="55" id="input_img_description" name="input_img_description"></textarea>
            </br>
            
            <input type="submit" value="Upload" id="input" name="input"></input>
        </form>
        <?php if (isset($status_message) && $status_message != '') echo $status_message;?>
    </div>

<?php include '../app/views/partials/foot.php'; ?>
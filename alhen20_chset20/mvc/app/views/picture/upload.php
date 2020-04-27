<?php
include '../app/views/partials/menu.php'; ?>

<div class="container">
    <div class="content">
        <div class="mainform">
            <form enctype="multipart/form-data" method="POST" onsubmit="return validateUp()" action="/alhen20_chset20/mvc/public/picture/upload">
                <label for="header" >Header</label>
                <br>
                <input type="text" name="header" id="header" onchange="checkHeaderUp()" />
                <br>
                <label for="image">Image</label>
                <br>
                <input type="file" name="image" id="image" accept=".jpg, .png, .jpeg, .gif" onchange="checkImgUp()" />
                <br>
                <label for="description" >Description</label>
                <br>
                <textarea name="description" id="description" rows="4" cols="50" onchange="checkDescUp()"></textarea>
                <input type="submit" name="upload" id="upload" value="Upload"/>
            </form>
        </div>
        <div id="error"></div>
    </div>
</div>

<?php
include '../app/views/partials/footer.php'; ?>

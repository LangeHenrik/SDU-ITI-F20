<?php include '../app/views/partials/menu.php'; ?>

<!--Form for uploading images via POST-->
<div class="main" align="center">
    <div class="wrapper" id="loginform">
        <h2>Upload Image Form</h2>
        <form method="post" action="/nipat10/mvc/public/image/upload" enctype="multipart/form-data" align="center">
            <p class="login-status"> here you can upload images of the types: *.jpg *.jpeg or *.png!</p>
            <p>with a maximum size of 10 mb</p>
            <hr>
            <label for="header">Header</label>
            <input type="header" placeholder="Enter header here.." id="header" name="header" required><br>

            <label for="description">Description</label>

            <input type="description" placeholder="Enter description here.." id="description" name="description" required><br>
            <input type="file" name="file"><br>
            <input type="submit" name="upload" id="upload" value="Upload Image" />
    </div>
    </form>
</div>
</div>

<?php include '../app/views/partials/foot.php'; ?>
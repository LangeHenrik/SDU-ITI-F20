<?php include '../app/views/partials/header.php'; ?>
<div>
    <h3 id="popUp">
        <?php if (isset($viewbag['Response'])) {
            echo $viewbag['Response'];
        } ?>
    </h3>
</div>

<div class="wrapper">
    <div class="content">
        <form method="post" action="/kaseb18frhaa18/mvc/public/Upload/uploadpicture" enctype='multipart/form-data'>
            <input type="text" name="head" id="head" placeholder="Enter a header for your upload!" required
                onkeyup="return checkHead()">
            <span id="head_err"></span>

            <textarea placeholder="Give your upload a small discription!" name="description" id="description" cols="30"
                rows="10" required onkeyup="return checkDescription()"></textarea>
            <span id="description_err"></span>

            <input type="file" name='file' id="file" required>
            <span id="file_err"></span>

            <button type="submit" value="Upload" name="upload">Upload now</button>
        </form>
    </div>
</div>
</body>
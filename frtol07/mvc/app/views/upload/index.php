<?php include '../app/views/partials/menu.php'; ?>

<div class="container">
    <form action="/frtol07/mvc/public/home/uploadImage" method="post" enctype="multipart/form-data" onchange=" updateList()">
        <label class="label"> Title:</label>
        <br><br>
        <textarea class="txtArea" id="header" name="header"> </textarea>
        <br><br>
        <label class="label"> Description:</label>
        <br><br>
        <textarea class="txtArea" id="description" name="description"> </textarea>
        <br><br>
        <label class="label"> Select image to upload:</label>
        <br> <br>
        <input value="Choose file" type="file" name="fileToUpload" id="fileToUpload" class="inputfile" >
        <label for="fileToUpload" class="bigBtn" >Choose a file</label>
        <p class="label">Selected file:</p>
        <div id="fileList" class="label"></div>
        <br><br>
        <input type="submit" value="Upload Image" name="submit" class="bigBtn" ">
    </form>
</div>
<?php include '../app/views/partials/foot.php'; ?>
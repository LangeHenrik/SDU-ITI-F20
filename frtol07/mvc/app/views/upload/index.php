<?php include '../app/views/partials/menu.php'; ?>
<!--<br><br><br>-->

<!--<div class="container">-->
<!--    <label class="label">Click here to go back to Image feed</label>-->
<!--</div>-->
<!---->
<!--<div class="container">-->
<!--    <a href="index">-->
<!--        <button class="bigBtn"> Go to Image feed</button>-->
<!--    </a>-->
<!--</div>-->


<!--<br><br>-->

<div class="container">
    <form action="/frtol07/mvc/public/home/uploadImage" method="post" enctype="multipart/form-data">
        <label class="label"> Header:</label>
        <br><br>
        <textarea class="txtArea" id="header" name="header"> </textarea>
        <br><br>
        <label class="label"> Description:</label>
        <br><br>
        <textarea class="txtArea" id="description" name="description"> </textarea>
        <br><br>
        <label class="label"> Select image to upload:</label>
        <br> <br>
        <input value="Choose file" type="file" name="fileToUpload" id="fileToUpload" class="inputfile">
        <label for="fileToUpload" class="bigBtn">Choose a file</label>
        <div id="file-upload-filename"></div>
        <br><br>
        <input type="submit" value="Upload Image" name="submit" class="bigBtn">
    </form>
</div>
<?php include '../app/views/partials/foot.php'; ?>
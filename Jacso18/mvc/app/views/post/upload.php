<?php
include '../app/views/partials/menu.php'; ?> 

<div class="wrapper">
        <div class="div-form">
            <form class= form id="form" method="POST" enctype="multipart/form-data" action="/jacso18/mvc/public/post/upload">
                <input type="text" name="title" id="title" placeholder="Title">
                <br>
                <label for="file">Select a file:</label>
                <br>
                <input type="file"  id="filetoupload" name="filetoupload" />
                <br>
                <textarea id="comment" name="comment" rows="4" cols="50" maxlength="150" placeholder="Write a comment" style="font-family:sans-serif"></textarea>
                <br>
                <div class="button"><input type="submit" name="upload" id="upload" value="upload" /></div>

            </form>
        </div>
    </div>

<?php
include '../app/views/partials/foot.php'; ?> 
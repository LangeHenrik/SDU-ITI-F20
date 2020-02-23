<?php
require_once('dbconfig/config.php');


if ($_SESSION['logged_in']) : ?>
    <br />
    <div id="upload-picture-container">
        <form method="POST" action="upload_page.php" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" name="submit_image" value="upload">
        </form>
    </div>
<?php else : ?>
    <!-- To be removed, only test -->
    <br />
    <div id="upload-picture-container">
        <form method="POST" action="upload_page.php" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" name="submit_image" value="upload">
        </form>
    </div>
    <h1>STAY OUT</h1>
<?php endif;
?>
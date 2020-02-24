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
    <!DOCTYPE>
    <header>
        <title>Upload page</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/upload_page_style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    </header>
    <div id="upload-picture-container">
        <form method="POST" action="upload_page.php" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" name="submit_image" value="upload">
        </form>
    </div>
    <a href="index.php">back to index</a>
    <h1>STAY OUT</h1>

    </html>

<?php endif;
?>

<!DOCTYPE html>
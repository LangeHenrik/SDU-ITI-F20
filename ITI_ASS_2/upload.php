<?php
require_once 'core/init.php';

$msg = "";
$user = new User();
//if upload button is pressed
if (isset($_POST['upload'])) {
    //the path to store the uploaded image
    $target = "images/".basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $upload = DB::getInstance()->insert('images', array(
        'image' => $image,
        'title' => $title,
        'description' => $desc,
        'uploadby' => $user->data()->username
    ));

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully!";
        Redirect::to('imagefeed.php');
    } else {
        $msg = "There was a problem uploading the image.";
    }
}

$user = new User();
if($user->isLoggedIn()){
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="content">
        <form method="post" action="upload.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image" required>
</div>
<div>
    <label for="title">Title</label><br>
    <input type="text" id="title" name="title" required>
</div>
<div>
    <label for="desc">Description</label><br>
    <textarea id="desc" name="desc" cols="40" rows="4"></textarea>
</div>
<div>
    <input id="lazybuttonfix" class="button" type="submit" name="upload" value="Upload">
</form>
</div>
</body>
</html>
<?php
} else {
    Redirect::to('index.php');
}
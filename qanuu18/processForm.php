<?php 
if (isset($_POST['upload-image'])) {
    echo "<pre>", print_r($_FILES['profileImage']['name']), "</pre>";

    $bio = $POST['bio'];
    $profileImageName = time(). '' . $_FILES['profileImage']['name'];
    die();

    $target = 'images/' . $profileImageName;

    move_uploaded_file($_FILES['profileImage']['tmp_name'], $target);
}
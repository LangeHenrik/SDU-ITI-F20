<?php
include 'includes/autoload.php';

?>

<!DOCTYPE html>
<html>

<head>
    <title>Upload image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/CSS/stylesheet.css">
</head>

<body>
    <nav>
        <div class="center">
            <ul class="menu">
                <li><a href="image_feed.php">Image feed</a></li>
                <li><a href="upload.php">Upload picture</a></li>
                <li><a href="user_list.php">Users</a></li>
                <li>
                    <form class="logout" method="POST">
                        <input type="submit" name="logout" id="logout" value="Logout" />
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper">
        <div class="div-form">
            <form class= form id="form" method="POST" enctype="multipart/form-data">
                <input type="text" name="title" id="title" placeholder="Title">
                <br>
                <label for="file">Select a file:</label>
                <br>
                <input type="file"  id="filetoupload" name="filetoupload" />
                <br>
                <textarea id="comment" name="comment" rows="4" cols="50" maxlength="150" placeholder="Write a comment" style="font-family:sans-serif"></textarea>
                <br>
                <input type="submit" name="upload" id="upload" value="upload">
            </form>
        </div>
    </div>

    <?php
    session_start();

    if (isset($_POST['upload'])) {
        $usercontroller = new UserController();
        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $comment = filter_input(INPUT_POST, "comment", FILTER_SANITIZE_STRING);
        $date = new DateTime();


        $name = $_FILES['filetoupload']['name'];
        $target_file = basename($_FILES["filetoupload"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Valid file extensions
        $extensions_arr = array("jpg", "jpeg", "png", "gif");

        // Check extension
        if (in_array($imageFileType, $extensions_arr)) {

            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['filetoupload']['tmp_name']));
            $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;
            // Insert record
            $usercontroller->savePost($_SESSION['username'], $title, $image, $comment);
        } else {
            echo 'The file has to be either jpg, jpeg, png or gif';
        }
    }
    Utility::redirectIfNotLoggedIn();
    Utility::logoutPressed();

    ?>

</body>

</html>
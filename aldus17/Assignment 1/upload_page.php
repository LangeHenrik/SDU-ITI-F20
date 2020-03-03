<?php
require_once('dbconfig_and_controllers/DBConnection.php');
require_once('dbconfig_and_controllers/DBController.php');
require_once('dbconfig_and_controllers/UserController.php');
?>
<?php
UserController::checkSession();
UserController::sessionRedirect();
UserController::logout();
?>

<!DOCTYPE html>
<header>
    <title>Upload</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/upload_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <html lang="en">
</header>

<body>

    <div class="navbar" id="navbar">
        <ul>
            <li><a class="active" href="front_page.php">Home</a></li>
            <li> <a href="#upload">Upload</a></li>
            <li> <a href="imagefeed_page.php">Imagefeed</a></li>
            <li> <a href="userlist_page.php">Userlist</a></li>
            <li>
                <form method="post">
                    <div class="inner_container">
                        <button class="logoutbtn" name="logoutbtn" type="submit">Log Out</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>

    <div id="upload-picture-container" class="upload_picture_container">
        <h1>Upload page</h1>
        <form method="post" action="upload_page.php" enctype="multipart/form-data">
            <input type="text" name="title" id="title" class="title" placeholder="Enter title of the image here" required />
            <br>
            <textarea type="text" id="description" name="description" maxlength="250" placeholder="Type a description to the image"></textarea>
            <br>
            <div class="upload-btn-wrapper">
                <button class="choosefilebtn">Choose image to upload</button>
                <input type="file" id="imageToBeUploaded" class="imageToBeUploaded" name="imageToBeUploaded" required />
            </div>
            <br>
            <input type="submit" name="uploadbtn" id="uploadbtn" class="uploadbtn" value="Upload image" />
        </form>
        <?php

        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
        $usercontroller = new UserController();

        if (isset($_POST['uploadbtn'])) {
            
            $imageFile = $_FILES["imageToBeUploaded"]["name"];
            $target_dir = "../upload/";
            $target_file = $target_dir . basename($_FILES["imageToBeUploaded"]["name"]);

            // Select file type
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Valid file extensions
            $extensions_arr = array("jpg", "jpeg", "png", "gif");

            if (in_array($imageFileType, $extensions_arr)) {

                // Read image path, convert to base64 encoding
                $imageConvertTo_base64 = base64_encode(file_get_contents($_FILES['imageToBeUploaded']['tmp_name']));

                // Format the image SRC:  data:{mime};base64,{data};
                $image = 'data:image/' . $imageFileType . ';base64,' . $imageConvertTo_base64;

                $usercontroller->uploadImage($_SESSION['username'], $image, $title, $description);
            }
        }
        ?>
    </div>
</body>
</html>
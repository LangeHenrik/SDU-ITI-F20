<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['logged_in']) && !$_SESSION['logged_in']) header('location:index.php');

    if(isset($_POST['input'])) {
        require_once 'db_config.php';

        $image_uploaded = false;
        $status_message = '';
        include_once('upload_img.php');

        $header = trim($_POST['input_img_header']);
        $description = trim($_POST['input_img_description']);
        $new_image = $target_file;

        filter_input(FILTER_SANITIZE_STRING, $header, FILTER_FLAG_NO_ENCODE_QUOTES);
        filter_input(FILTER_SANITIZE_STRING, $description, FILTER_FLAG_NO_ENCODE_QUOTES);
        filter_input(FILTER_SANITIZE_STRING, $new_image, FILTER_FLAG_NO_ENCODE_QUOTES);

        if ($image_uploaded) {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname",
                                $username,
                                $password,
                                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                
                $insert_query = "INSERT INTO image (image, header, description)
                                    VALUES (:image, :header, :description)";

                $stmt = $conn->prepare($insert_query);
                $stmt->bindParam(':image', $new_image, PDO::PARAM_STR);
                $stmt->bindParam(':header', $header, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);

                //echo $new_image;

                $stmt->execute();

                $relation_query = 'INSERT INTO user_image (user_id, image_id)
                                    VALUES (
                                        (SELECT user_id FROM user WHERE username="'.$_SESSION['username'].'"),
                                        (SELECT image_id FROM image WHERE image="'.$new_image.'")
                                    )';

                $stmt = $conn->prepare($relation_query);
                $stmt->execute();
            }
            catch(PDOException $e) {
                $e->getMessage();
            }
            
            $conn = null;
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
        <title>Upload</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
	</head>

	<body>	

    <nav>
        <div class="topnav" id="myTopnav">
            <a href="index.php">Frontpage</a>
            <a href="registration.php">Registration</a>
            <a href="upload.php" class="active">Upload</a>
            <a href="image_feed.php">Image feed</a>
            <a href="userlist.php">User list</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>	
    </nav>

    <div class="form_div">
        <form method="post" enctype="multipart/form-data">
            <legend>Upload image:</legend>

            <label for="input_img">Select image:</label>
            <input type="file" id="input_img" name="input_img"></input>
            </br>
            <label for="input_img_header">Header of the image:</label>
            <input type="text" id="input_img_header" name="input_img_header"></input>
            </br>
            <label for="input_img_description">Description of the image:</label></br>
            <!--<input type="text" id="input_img_header" name="input_img_header"></input>-->
            <textarea rows="3" cols="55" id="input_img_description" name="input_img_description"></textarea>
            </br>
            
            <input type="submit" value="Upload" id="input" name="input"></input>
        </form>
        <?php if (isset($status_message) && $status_message != '') echo $status_message;?>
    </div>
    

    <script src="code.js"></script>
    </body>
</html>


<?php


class UploadImage extends Database
{


    public function upload()
    {
        $target_dir = "images/";
//        $target_dir = "frtol07/mvc/public/images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                UploadImage::console_log("File is an image ");
                UploadImage::console_log($check["mime"]);
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                UploadImage::console_log("The file ");
                UploadImage::console_log( basename($_FILES["fileToUpload"]["name"]));
                UploadImage::console_log(" has been uploaded to: ");
                UploadImage::console_log($target_file);

                $name = $target_file;
                $user = $_SESSION['username'];
                $header = $_POST['header'];
                $description = $_POST['description'];

                $file = file_get_contents($target_file);
                $base64 ="data:image;base64," . base64_encode($file);
                $image = $target_file;

//         Prepared statement  -> not blob
                $query = "INSERT INTO images (name,user,description,header,image) VALUES(:name,:user,:description,:header,:image)";
                $query = $this->conn->prepare($query);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':user', $user, PDO::PARAM_STR);
                $query->bindParam(':description', $description, PDO::PARAM_STR);
                $query->bindParam(':header', $header, PDO::PARAM_STR);
                $query->bindParam(':image', $image, PDO::PARAM_STR);

                $query->execute();

//         Prepared statement  -> blob
                $query = "INSERT INTO imagesblob (name,user,description,title,image) VALUES(:name,:user,:description,:header,:image)";
                $query = $this->conn->prepare($query);
                $query->bindParam(':name', $name, PDO::PARAM_STR);
                $query->bindParam(':user', $user, PDO::PARAM_STR);
                $query->bindParam(':description', $description, PDO::PARAM_STR);
                $query->bindParam(':header', $header, PDO::PARAM_STR);
                $query->bindParam(':image', $base64, PDO::PARAM_STR);

                $query->execute();

                return true;

            } else {
                echo "Sorry, there was an error uploading your file.";
                return false;
            }


        }
    }


    ////Write to console.log
    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
}

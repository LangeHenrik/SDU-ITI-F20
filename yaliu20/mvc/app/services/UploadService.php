<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/yaliu20/mvc/app/core/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/yaliu20/mvc/app/models/Image.php';

class UploadService
{
    private $title;
    private $description;
    private $extensions_arr;
    private $imageFile;
    private $target_dir;
    private $target_file;
    private $imageModel;

    public $errors;

    public function __construct()
    {

        $this->extensions_arr = array("jpg", "jpeg", "png", "gif"); // Valid file extensions
        $this->imageModel = new Image();

        $this->title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->imageFile = $_FILES["imageToBeUploaded"]["name"];
    }

    public function uploadPicture($username)
    {
        /* $infoMsg = "<div class='alert alert-info alert-dismissible' data-dismiss='alert' role='alert'>" .
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
            "<strong>Information!</strong> Please upload a picture </div>"; */

        $errorMsgFormat = "<div class='alert alert-warning alert-dismissible' data-dismiss='alert' role='alert'>" .
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
            "<strong>Warning!</strong> Error occured while uploading image, make sure it is in 'jpg', 'jpeg', 'png', 'gif' </div>";

        $uploadSuccessMsg = "<div id='successMessageAlert' class='alert alert-success alert-dismissible' data-dismiss='alert' role='alert'>" .
            "<button type='button' class='close' data-dismiss='alert'>&times;</button>" .
            "<strong>Success!</strong> Uploaded picture successfully" .
            "</div>";
        if (isset($_POST['uploadbtn'])) {

            $this->target_dir = "../upload/";
            $this->target_file = $this->target_dir  . basename($this->imageFile);
            // Select file type
            $imageFileType = $this->getImageFileType($this->target_file);

            if (in_array($imageFileType, $this->extensions_arr)) {

                // Read image path, convert to base64 encoding
                $imageConvertTo_base64 = $this->convertImageToBase64($_FILES['imageToBeUploaded']['tmp_name']);

                // Format the image SRC:  data:{mime};base64,{data};
                $image = 'data:image/' . $imageFileType . ';base64,' . $imageConvertTo_base64;

                $this->imageModel->insertImageByUsername($username, $image, $this->title, $this->description);
                //header("refresh:1;url=/yaliu20/yaliu20 assignment2/mvc/public/user/upload");
                //header('Location:/yaliu20/yaliu20 assignment2/mvc/public/user/uploadStatus/true');


                $this->setError($uploadSuccessMsg);
                return true;
            } else {

                $this->setError($errorMsgFormat);
                return false;
                exit();
            }
        } else {
            $this->setError($infoMsg);
            return null;
            exit();
        }
        $this->setError($infoMsg);
        return null;
        exit();
    }

    private function getImageFileType($file)
    {
        return strtolower(pathinfo($file, PATHINFO_EXTENSION));
    }

    private function convertImageToBase64($file)
    {
        return base64_encode(file_get_contents($file));
    }

    private function setError($error)
    {
        $this->errors[] = $error;
    }
    public function getErrors()
    {
        if (!empty($errors)) {
            foreach ($this->errors as $error) {
                return $error;
            }
        }
    }
}

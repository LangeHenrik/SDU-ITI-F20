<?php

class UserController extends Controller
{

    public function index($param)
    {
        //This is a proof of concept - we do NOT want HTML in the controllers!
        $viewbag = array();

        if (isset($_SESSION['username']) && isset($_SESSION['logged_in'])) {
            $viewbag['logged_in'] = true;
            $viewbag['fullname'] = $_SESSION['fullname'];
            $viewbag['username'] = $_SESSION['username'];

            $this->view('user/index', $viewbag);
        } else {
            $this->view('partials/restricted', $viewbag);
        }
    }

    public function upload()
    {
        $this->view('user/upload_page');
        $viewbag = array();


        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $_SESSION['uploadMessage'] = 0;

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


                $this->model('Image')->insertImageByUsername($_SESSION['username'], $image, $title, $description);
                header("refresh:1;url=/aldus17/mvc/public/user/upload");
                //header('Location: /aldus17/mvc/public/user/uploadStatus/true');
                echo 'Picture uploaded';
                $_SESSION['uploadMessage'] = 1;
                
            } else {
                //header('Location: /aldus17/mvc/public/user/uploadStatus/false');
                echo 'Error occured while uploading image, make sure it is in "jpg", "jpeg", "png", "gif"';
                header("Location: /aldus17/mvc/public/user/upload");
                $_SESSION['uploadMessage'] = 2;
            }

            
            
        }
        
        
    }

    public function imagefeed()
    {
        $this->view('user/imagefeed_page');
        $this->model('Image')->getAllImages();
    }


    public function userlist()
    {
        $this->view('user/userlist_page');
    }
}

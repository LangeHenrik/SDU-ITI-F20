<?php

class UploadController extends Controller
{
    public function index()
    {
        $this->view('home/upload');
    }

    public function uploadImage()
    {
        if ($this->post()) {
            $viewbag = [];

            $image_title = filter_var($_POST["image-title"], FILTER_SANITIZE_STRING);
            $image_description = filter_var($_POST["image-description"], FILTER_SANITIZE_STRING);

            $regex = "/^.+$/";
            if (
                !preg_match($regex, $image_title)
                || !preg_match($regex, $image_description)
                || !isset($_FILES["fileToUpload"]["name"])
            ) {
                $viewbag['errorMessage'] = "Missing inputs! All fields are required.";
                $this->view('home/upload', $viewbag);
                return;
            }

            $file = basename($_FILES["fileToUpload"]["name"]);
            $filetype = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            $file_content = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);

            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check === false) {
                    $viewbag['errorMessage'] =  "File is not an image.";
                    $this->view('home/upload', $viewbag);
                    return;
                }
            }

            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $viewbag['errorMessage'] =  "Sorry, your file is too large.";
                $this->view('home/upload', $viewbag);
                return;
            }

            if (
                $filetype != "jpg"
                && $filetype != "png"
                && $filetype != "jpeg"
                && $filetype != "gif"
            ) {
                $viewbag['errorMessage'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $this->view('home/upload', $viewbag);
                return;
            }

            $encoded_image = $this->encode_and_save_image($file_content, $filetype, $image_title, $image_description);

            $viewbag['successMessage'] =  'Image uploaded succesfully!<br><img src="'
                . $encoded_image
                . '"/><br>title: ' . $image_title
                . '<br>Description: ' . $image_description;


            $this->view('home/upload', $viewbag);
        }
    }

    private function encode_and_save_image($content, $filetype, $image_title, $image_description)
    {
        $encoded_image = 'data:image/' . $filetype . ';base64,' . base64_encode($content);
        $current_user = $_SESSION['currentUser'];
        $this->model('Picture')->postPicture($encoded_image, $image_title, $image_description, $current_user);
        return $encoded_image;
    }
}

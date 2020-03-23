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
        }
    }

    public function upload()
    {
        $this->view('user/upload_page');

        $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

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

                if ($this->model('Image')->insertImage($_SESSION['username'], $image, $title, $description)) {
                    return true;
                } else {
                    echo 'Error occured while uploading image';
                    return false;
                }
            }
        }
    }

    public function imagefeed()
    {
        $this->view('user/imagefeed_page');

        
    }

    public function searchImage($searchParameter) {
        $searchParameter = filter_input(INPUT_GET, 'searchParameter', FILTER_SANITIZE_STRING);

        $imageResults = $this->model('Image')->getAllImages();

        $imageData = array();


        if ($searchParameter !== "" || !empty($searchParameter)) {
            $searchParameter = strtolower($searchParameter);
            $searchParameterLength = strlen($searchParameter);
            foreach ($imageResults as $image) {
                if (stristr($searchParameter, substr($image['username'], 0, $searchParameterLength))) {
                    array_push($imageData, $image);
                }
            }
        } else {
            // get all image data if search did not find anything
            $imageData = $imageResults;
        }

        foreach ($imageData as $img) {

            echo '<div class="imagePost">';
            echo "<h1>" . $img['title'] . "</h1>";
            echo "<p>" . $img['description'] . "</p>";
            echo '<img src="' . $img['image'] . '"/>';
            echo "<p><i>" . "Posted by: " . $img['username'] . str_repeat('&nbsp;', 2) . " created on: " . $img['creationTime'] . "</i></p>";
            echo '</div>';
            echo "<hr>";
        }
    }

    public function userlist()
    {
        $this->view('user/userlist_page');
    }
}

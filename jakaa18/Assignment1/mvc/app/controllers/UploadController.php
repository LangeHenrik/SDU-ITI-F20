<?php

class UploadController extends Controller
{

    public function __construct()
    {
        header('Content-Type: application/json');
        //check api-key?
        //check username and password?
        //or die();
    }

    public function index($param)
    {
        $path = "../app/views/home/index.php";
        include $path;
    }

    public function upload()
    {
        if (isset($_POST["imgSubmit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                $image = $_FILES['image']['tmp_name'];
                $type = pathinfo($image, PATHINFO_EXTENSION);
                $imgContent = 'data:image/' . $type . ';base64' . base64_encode(file_get_contents($image));
                $user = $_SESSION["sessionUser"];
                $header = $_POST["header"];
                $description = $_POST["imgDescription"];

                $json = json_encode($header, $imgContent, $user, $description);
                $ApiController = new ApiController();
                $ApiController->pictures('user', $json);
            }
        }
    }
}
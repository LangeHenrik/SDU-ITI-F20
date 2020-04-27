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
        $path = "../app/views/upload/index.php";
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
                $user = $_SESSION["username"];
                $header = $_POST["header"];
                $description = $_POST["imgDescription"];
                $jarr = array('jheader' => $header, 'juser' => $user, 'jdescription' => $description, 'jimage' => $imgContent);
                $json = json_encode($jarr);
                //$ApiController = \ApiController::class;
                $ApiController = __NAMESPACE__ . '\\' . ApiController::class;
                $ApiController->pictures('user', $json);
            }
        }
    }
}
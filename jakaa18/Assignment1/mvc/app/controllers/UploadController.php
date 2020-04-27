<?php
class UploadController extends Controller
{
    public $logged_in;
    public $viewbag;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
            $this->logged_in=true;
            $this->viewbag['username']=$_SESSION['username'];
        }
        $this->viewbag['logged_in'] = $this->logged_in;
        //check api-key?
        //check username and password?
        //or die();
    }

    public function index($param)
    {
        if ($this->logged_in) {
            $this->view('upload/index', $this->viewbag);
        } else {
            $this->view('home/login', $this->viewbag);
        }
    }

    public function upload()
    {
        if (isset($_POST["imgSubmit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== null) {
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
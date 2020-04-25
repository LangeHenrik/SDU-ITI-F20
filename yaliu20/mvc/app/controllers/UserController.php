<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/yaliu20/mvc/app/services/UploadService.php';

class UserController extends Controller
{
    private $uploadService;

    public function index()
    {
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
        ob_start();
        $this->view('user/upload_page');
        //$viewbag = array();

        //$_SESSION['uploadMessage'] = 0;

        if ($this->post()) {
            $this->uploadService = new UploadService();

            $uploadImage = $this->uploadService->uploadPicture($_SESSION['username']);

            if ($uploadImage == null) {
                $_SESSION['uploadMsg'] = $this->uploadService->errors[0];
                header("Location: /yaliu20/mvc/public/user/upload");
            } elseif ($uploadImage == false) {
                $_SESSION['uploadMsg'] = $this->uploadService->errors[0];
                header("Location: /yaliu20/mvc/public/user/upload");
            } else {
                $_SESSION['uploadMsg'] = $this->uploadService->errors[0];
                header("Location: /yaliu20/mvc/public/user/upload");
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

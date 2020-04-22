<?php
class ApiController extends Controller
{
    public function __construct()
    {
        //header('Content-Type: application/json');
    }

    public function users() {

        $users = $this->model('User')->list();
        echo json_encode($users,JSON_PRETTY_PRINT);

    }
    public function pictures($user, $id) {
        $user = filter_var($user, FILTER_SANITIZE_STRING);
        if ($user != "user") {
            return null;
        }
        if($this->post()) {
            $UploadInfo = json_decode($_POST['json'], true);
            print_r($UploadInfo);
            $UploadInfo['userid'] = $id;
            if($this->model('User')->verifyUser($UploadInfo)) {
                $postedImage = $this->model('Image')->ApiUploadImage($UploadInfo);
            }
        } elseif ($this->get()) {
            $result = $this->model('Image')->getUserImages($id);
            echo json_encode($result,JSON_PRETTY_PRINT);

        }

    }
}
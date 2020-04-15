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
        if($this->post()) {
            $UploadInfo = json_decode($_POST['json'], true);
            print_r($UploadInfo);
            $UploadInfo['userid'] = $id;
            if($this->model('User')->verifyUser($UploadInfo)) {
                $postedImage = $this->model('Image')->ApiUploadImage($UploadInfo);
            }
        }

    }
}
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
            $UploadInfo['userid'] = $id;
            if($this->model('User')->verifyUser($UploadInfo)) {
                $postedImage = $this->model('Image')->ApiUploadImage($UploadInfo);
                echo json_encode($postedImage,JSON_PRETTY_PRINT);
            }
        } elseif ($this->get()) {
            $result = $this->model('Image')->getUserImages($id);
            echo json_encode($result,JSON_PRETTY_PRINT);

        }

    }
}
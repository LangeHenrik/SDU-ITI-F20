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
    }

    public function imagefeed()
    {
        $this->view('user/imagefeed_page');
    }

    public function userlist()
    {
        $this->view('user/userlist_page');
    }
}

<?php

class UserController extends Controller
{

    public function index($param)
    {
        //This is a proof of concept - we do NOT want HTML in the controllers!
        $viewbag = array();

        if (isset($_SESSION['username'])) {
            $viewbag['logged_in'] = true;
        }

        $this->view('home/index', $viewbag);
    }

    
}

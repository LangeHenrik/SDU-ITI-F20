<?php

class UserlistController extends Controller
{
    public function index()
    {
        $viewbag = $this->model('User')->getUser();
        $this->view('home/userlist', $viewbag);
    }

    public function getSpecificUsername($username = "")
    {

        if ($this->get()) {
            $user = $this->model('User')->getUser($username);
            return $user;
        }
    }
}

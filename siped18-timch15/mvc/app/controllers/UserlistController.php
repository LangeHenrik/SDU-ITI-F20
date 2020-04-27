<?php

class UserlistController extends Controller
{
    public function index($user = "")
    {
        $viewbag = $this->model('User')->getUsers($user);
        $this->view('home/userList', $viewbag);
    }

    public function getSpecificUsers($user = "")
    {
            $users = $this->model('User')->getUsers(urldecode($user));
            echo json_encode($users, JSON_PRETTY_PRINT);
        
    }
}

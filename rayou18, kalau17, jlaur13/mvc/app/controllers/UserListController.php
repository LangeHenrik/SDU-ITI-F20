<?php


class UserListController extends Controller
{
    public function index()
    {
        $users = $this->model('User')->getAll();
        $viewbag["user"] = $users;

        $this->view("users/userlist", $viewbag);
    }
}
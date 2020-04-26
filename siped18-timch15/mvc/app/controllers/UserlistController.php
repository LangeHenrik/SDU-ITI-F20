<?php

class UserlistController extends Controller
{
    public function index()
    {
        $viewbag = $this->model('User')->getSearchUser();
        $this->view('home/userlist', $viewbag);

    }

}

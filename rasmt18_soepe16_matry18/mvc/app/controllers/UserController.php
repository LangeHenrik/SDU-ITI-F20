<?php


class UserController extends Controller
{
    public function index() {
        $viewbag['users'] = $this->model('User')->list();
        return($this->view('user/index', $viewbag));
    }
}
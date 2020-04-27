<?php

class UserController extends Controller
{
    public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
    }

    public function user_list()
	{
		$viewbag['users'] = $this->model('User')->getAllUser();
		$this->view('user/user_list', $viewbag);
	}
}

<?php

class UserListController extends Controller
{
	public function index($user = "")
	{
		if ($this->get()) {
			$viewbag = $this->model('User')->getUsers($user);
			$this->view('home/userList', $viewbag);
		}
		$this->nameOfUser();
	}

	public function getSpecificUsers($user = "")
	{
		if ($this->get()) {
			$users = $this->model('User')->getUsers(urldecode($user));
			echo json_encode($users, JSON_PRETTY_PRINT);
		}
	}
}
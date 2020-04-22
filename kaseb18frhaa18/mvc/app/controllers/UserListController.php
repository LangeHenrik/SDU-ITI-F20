<?php

class UserListController extends Controller
{
	public function index($param)
	{
		$this->view('home/userList');
	}
}

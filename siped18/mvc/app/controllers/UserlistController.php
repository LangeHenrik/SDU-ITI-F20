<?php

class UserlistController extends Controller
{
	public function index($param)
	{
        $this->view('home/userlist');
	}
}
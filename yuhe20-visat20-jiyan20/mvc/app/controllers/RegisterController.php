<?php

class RegisterController extends Controller
{
	public function index()
	{
		$this->view('home/SignUp');
	}

	public function registration()
	{
		if ($this->post()) {
			$response = $this->model('user')->register();
			$this->view('home/SignUp', $response);
		}
	}
}
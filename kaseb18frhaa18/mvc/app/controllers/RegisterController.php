<?php

class RegisterController extends Controller
{
	public function index()
	{
		$this->view('home/registration');
		//$this->nameOfUser();
	}

	public function registration()
	{
		if ($this->post()) {
			$response = $this->model('user')->register();
			$this->view('home/registration', $response);
			//$this->nameOfUser();
		}
	}
}
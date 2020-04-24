<?php

class UploadController extends Controller
{

	public function index()
	{
		$this->view('home/uploadPage');
		$this->nameOfUser();
	}

	public function uploadPicture()
	{
		if ($this->post()) {
			$success = $this->model('Picture')->uploadPicture();
			$this->view('home/uploadPage');
		}
	}
}
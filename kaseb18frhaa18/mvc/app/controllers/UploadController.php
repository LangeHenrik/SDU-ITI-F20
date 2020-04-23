<?php

class UploadController extends Controller
{

	public function index($param)
	{
		$this->view('home/uploadPage');
	}

	public function uploadPicture()
	{
		if ($this->post()) {
			$success = $this->model('Picture')->uploadPicture();
			$this->view('home/uploadPage');
		}
	}
}
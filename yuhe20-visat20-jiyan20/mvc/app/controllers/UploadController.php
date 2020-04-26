<?php

class UploadController extends Controller
{

	public function index()
	{
		$this->view('home/upload');
	}

	public function uploadPicture()
	{
		if ($this->post()) {
			$response_message = $this->model('Image')->uploadPicture();
			$response = array('Response' => $response_message);
			$this->view('home/upload', $response);
		}
	}
}
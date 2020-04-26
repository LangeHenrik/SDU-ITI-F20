<?php

class UploadController extends Controller
{

	public function index()
	{
		$this->view('home/Upload');
	}

	public function UploadImage()
	{
		if ($this->post()) {
			$response_message = $this->model('Image')->UploadImage();
			$response = array('Response' => $response_message);
			$this->view('home/Upload', $response);
		}
	}
}
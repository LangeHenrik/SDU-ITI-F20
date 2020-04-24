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
			$response_message = $this->model('Picture')->uploadPicture();
			$response = array('Response' => $response_message);
			$this->view('home/uploadPage', $response);
		}
	}
}
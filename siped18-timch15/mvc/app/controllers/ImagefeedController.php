<?php

class ImagefeedController extends Controller
{

	public function index()
	{
		$viewbag['currentUser'] = $_SESSION['currentUser'];
		$viewbag['image'] = "Image in base64"; //TODO get from db
		$viewbag['userPostHeader'] = "Header"; //TODO
		$viewbag['userPostHeader'] = "Header"; //TODO
		$viewbag['userPostDescription'] = "Description"; //TODO

		$this->view('home/imagefeed', $viewbag);
    }
}
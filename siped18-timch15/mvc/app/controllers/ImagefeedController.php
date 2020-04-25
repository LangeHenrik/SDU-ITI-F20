<?php

class ImagefeedController extends Controller
{

	public function index()
	{
		$viewbag = $this->model('Picture')->getImagePosts();
		$viewbag['currentUser'] = $_SESSION['currentUser'];
		$this->view('home/imagefeed', $viewbag);
	}
}

<?php

class ImageFeedController extends Controller
{
	public function index()
	{
		$viewbag = $this->model('Image')->loadImageFeed();
		$this->view('home/Feed', $viewbag);
	}
}
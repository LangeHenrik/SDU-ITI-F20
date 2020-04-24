<?php

class ImageFeedController extends Controller
{
	public function index()
	{
		$viewbag = $this->model('Picture')->loadImageFeed();
		$this->view('home/imageFeed', $viewbag);
		$this->nameOfUser();
	}
}
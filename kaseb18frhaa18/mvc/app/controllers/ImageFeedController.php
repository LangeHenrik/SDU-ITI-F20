<?php

class ImageFeedController extends Controller
{
	public function index()
	{
		$this->view('home/imageFeed');
		$this->model('Picture')->loadImageFeed();
		$this->nameOfUser();
	}
}

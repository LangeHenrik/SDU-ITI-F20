<?php

class ImageFeedController extends Controller
{
	public function index()
	{
		$viewbag = $this->model('Image')->FeedLoad();
		$this->view('home/Feed', $viewbag);
	}
}
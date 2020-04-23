<?php

class ImageFeedController extends Controller
{
	public function index($param)
	{
		$this->view('home/imageFeed');
	}

	public function loadImageFeed(){
		echo "<h2>hi</h2>";
	}
}

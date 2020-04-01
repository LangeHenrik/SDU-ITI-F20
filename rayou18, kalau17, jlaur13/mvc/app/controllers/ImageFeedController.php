<?php


class ImageFeedController extends Controller
{
    public function getAllImages()
    {

        $this->view("pictures/imagefeed", $viewbag);
    }
}
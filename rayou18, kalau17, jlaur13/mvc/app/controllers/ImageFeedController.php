<?php


class ImageFeedController extends Controller
{
    public function index()
    {
        $images = $this->model('Picture')->getAll();
        $viewbag["image"] = $images;

        $this->view("pictures/imagefeed", $viewbag);
    }
}
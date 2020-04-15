<?php
class ApiController extends Controller
{
    public function __construct()
    {
        header('Content-Type: application/json');
    }

    public function users() {

        $users = $this->model('User')->list();
        echo json_encode($users,JSON_PRETTY_PRINT);

    }
}
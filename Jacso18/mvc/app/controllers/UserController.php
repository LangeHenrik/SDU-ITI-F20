<?php



class UserController extends Controller
{
    public function __construct()
	{
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
    }

    public function users()
	{
		$users = $this->model('User')->getAll();
		$viewbag['users'] = $users;
		$this->view('user/users', $viewbag);
	}
    

}
<?php

class HomeController extends Controller
{

	public function index($param)
	{
		//This is a proof of concept - we do NOT want HTML in the controllers!
		$viewbag = array();

		if (isset($_SESSION['username'])) {
			$viewbag['logged_in'] = true;
		}

		$this->view('home/index', $viewbag);
	}

	/*public function other($param1 = 'first parameter', $param2 = 'second parameter')
	{
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}*/



	public function login($username)
	{
		/*if ($this->model('User')->login($username)) {
			$_SESSION['logged_in'] = true;
			$this->view('home/login');*/

		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

		$userResult = $this->model('User')->getUserByUsername($username);



		foreach ($userResult as $user) {
			if ($user['username'] == $username && password_verify($password, $user['password'])) {
				$_SESSION['logged_in'] = true;
				$viewbag['fullname'] = $user['fullname'];
				$viewbag['username'] = $user['username'];

				$_SESSION['username'] = $user['username'];
				$_SESSION['fullname'] = $user['fullname'];

				$this->view('user/index', $viewbag);

				//header('Location: /mvc/public/home/front_page');
			} else {
				$_SESSION['logged_in'] = false;
				$this->view('home/login');
			}
		}
	}

	public function register()
	{
		$this->view('home/registration_page');


		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
		$cpassword = filter_input(INPUT_POST, 'password_confirm', FILTER_SANITIZE_STRING);
		$errors = array();

		if (isset($_POST['registerbtn'])) {
			if ($password != $cpassword) {
				echo "<div id='messageWarningsmall'>" .
					"Password did not match" .
					"</br> " .
					"</div>";
				exit();
			}
			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);
			if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
				echo "<div id='messageWarningsmall'>" .
					"Password should be at least 8 characters in length and should include at least one upper case letter and one number" .
					"</br> " .
					"</div>";
				exit();
			}

			$regexCheckUsername = preg_match('/^([A-Za-z0-9]){4,20}$/', $username);
			if (empty($username) || !$regexCheckUsername) {
				echo "<div id='messageWarning'>" .
					"You entered username: <b>" .
					$username . "</b> " . "<br>  ERROR - " .
					"Username is empty or username is not between 4-20 characters long, only numbers and letters, no special characters" .
					"</br> " .
					"</div>";
				exit();
			}

			$regexCheckFullname = preg_match('/(^(\w+\s+\D).+$)/', $fullname);
			if (empty($fullname) || !$regexCheckFullname) {
				echo "<div id='messageWarning'>" .
					"You entered fullname: <b>" .
					$fullname . "</b> " . "<br>  ERROR - " .
					"The fullname is either empty or fullname must contain first and lastname, no numbers allowed" .
					"</br> " .
					"</div>";
				exit();
			}

			$regexCheckEmail = preg_match('/(\b[\w\.-]+@[\w\.-]+\.\w{2,26}\b)/', $email);
			if (empty($email) || !$regexCheckEmail) {
				echo "<div id='messageWarning'>" .
					"You entered email: <b>" .
					$email . "</b> " . "<br>  ERROR - " .
					"Email is either empty or email must contain a @ and a . afterwards, e.g. test@test.com" .
					"</br> " .
					"</div>";
				exit();
			}

			if ($this->model('User')->checkIfUserExists($username) == true) {
				echo "<div id='messageWarningsmall'>" .
					"User with username " .
					$username .
					" has already been created" .
					"</br> " .
					"</div>";
				exit();
				
			} else {
				$this->model('User')->insertUser($username, $fullname, $email, $password);
				echo "<div id='messageSuccess'>" .
					"User with " .
					$username .
					" and " .
					$email .
					" created successfully" .
					"</br> " .
					"</div>";
			}
		}
	}

	public function restricted()
	{
		echo 'Welcome - you must be logged in';
	}

	public function logout()
	{
		session_destroy();
		header('Location: /aldus17/mvc/public/home/');
	}
}

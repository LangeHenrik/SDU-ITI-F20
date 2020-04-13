<?php

class HomeController extends Controller {

	public function index ($param = null) {
		$viewbag['title'] = 'Home';
		$this->view('home/index', $viewbag);
	}

	public function other ($param1 = 'first parameter', $param2 = 'second parameter') {
		$user = $this->model('User');
		$user->name = $param1;
		$viewbag['username'] = $user->name;
		//$viewbag['pictures'] = $this->model('pictures')->getUserPictures($user);
		$this->view('home/index', $viewbag);
	}

	public function restricted () {
		echo 'Welcome - you must be logged in';
	}

	public function login($username) {
		$viewbag['title'] = 'Login';
		if (isset($_POST['formConnexion'])) {
		    //clean input  & XSS
		    $usernameCon = filter_var($_POST['usernameCon'], FILTER_SANITIZE_STRING);
		    $username    = htmlspecialchars($usernameCon);
		    $passwordCon = filter_var($_POST['passwordCon'], FILTER_SANITIZE_STRING);
		    $password    = htmlspecialchars($passwordCon);
		    if (!empty($username) AND !empty($password)) {
		 		$res = $this->model('User')->login($username);
		        $isPasswordCorrect = password_verify($password, $res['password']);
		        // Check if the user exist in the database
		        if (!$res) {
		            $viewbag['error'] = "This username is not in the database";
		        } else {
		            if ($isPasswordCorrect) {
		                $_SESSION['id']       = $res['id_user'];
		                $_SESSION['username'] = $res['username'];
		                $_SESSION['mail']     = $res['email'];
						header('Location:'.URL.'home');
		            }
		            // Check if the password match the databse
		            else {
		                $viewbag['error'] = "Wrong password/Username combination. Please try again";
		            }
		        }
		    } else {
		        $viewbag['error'] = "Complete all fields";

		    }
		}
		$this->view('home/login', $viewbag);
	}

	public function register(){
		$viewbag['title'] = 'Login';
		if (isset($_POST['formRegistration'])) {
			$usernameReg = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
			$username = htmlspecialchars($usernameReg);
			$emailReg = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			$email = htmlspecialchars($emailReg);
			$passwordReg = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
			$password = htmlspecialchars($passwordReg);
			$password2Reg = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);
			$password2 = htmlspecialchars($password2Reg);
			if(!empty($username) AND !empty($email) AND !empty($password)) {
				$passwordCheck = preg_match('/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/', $password);
				$mailCheck=preg_match('/^\S+@\S+\.[a-z|A-Z]{2,10}$/', $email);
				if($passwordCheck) {
				  if ($mailCheck) {
				    $U = $this->model('User')->checkUsernameDB($username);
				    $M = $this->model('User')->checkMailDB($email);
				    if($U != 1){
				      if ($M != 1){
				        if($password == $password2) {
				          $passhash = password_hash($_POST['password'], PASSWORD_DEFAULT);
				          if($this->model('User')->register(array($username, $passhash, $email)))
				              $viewbag['success'] = "Account Created ! <a href='".URL."home/login'>Log in</a>";
				        }
				        else {
				          $viewbag['error'] = "Both password not match";
				        }
				      }
				      else {
				      	$viewbag['error'] = "Already registred with this email";
				      }

				    }
				    else {
				      $viewbag['error'] = "Username already taken";
				    }
				  }
				  else {
				    $viewbag['error'] ="Invalid email";
				  }
				}
				else {
				  $viewbag['error']="Your password should have at least 8 characters, one lower case char, one upper case, and at least one number, and a special char";
				}
			}
			else {
			$viewbag['error'] = "You need to fill all the fields";
			}
		}
		$this->view('home/register', $viewbag);
	}
	/**
	* session protected
	*/
	public function logout() {
		session_destroy();
		header('Location:'.URL.'home');
	}

}

<?php
class User extends Database {
	
	public function login(){

		$username = filter_var($_REQUEST["username"], FILTER_SANITIZE_STRING);
		$password = filter_var($_REQUEST["password"], FILTER_SANITIZE_STRING);

		if (empty($username) || empty($password)) {
			return false;
		}

		$sql = "SELECT user_id, username, user_password FROM users WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		if ($stmt->rowCount() > 0 ) {

			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			$checkPassword = password_verify($password, $result['user_password']);

			// $checkPassword = true; // testing purposes. password_verify is mad because it's not hashed currently

			if ($checkPassword == false) {

				// wrong password
				return false;
			} 
			elseif ($checkPassword == true) {
				$_SESSION['session_id'] = $result['user_id'];
				$_SESSION['session_username'] = $result['username'];
				$_SESSION['logged_in'] = true;

				// success
				return true;
			}
			else {
				return false;
			}
		} else {

			// user not found
			return false;
		}
	}

	public function users() {

	}

	public function registerUser() {
		
		$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
		$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
		$passwordConfirm = filter_var($_POST['password-confirm'], FILTER_SANITIZE_STRING);

		if (empty($username) || empty($password) || empty($passwordConfirm)) {
			return false;
		}
		else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			return false;
		}
		else if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
			return false;
		}
		else if ($password !== $passwordConfirm) {
			return false;
		}
		
		$stmt = $this->conn->prepare("SELECT username FROM users WHERE username=:username");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			// user taken
			return false;
		}

		$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
		
		$stmt = $this->conn->prepare("INSERT INTO users (
												  user_id, 
												  username, 
												  user_password) 
												  VALUES (
													  NULL, 
													  :username, 
													  :user_password
												  )");
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':user_password', $hashedPwd, PDO::PARAM_STR);
		$stmt->execute();

		// Success
		return true;
		
	}

	// duplicate function. Other place is Image.php
	public function isUsernameAndPasswordCorrect($username, $password) {

		$sql = "SELECT username, user_password FROM users WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		if ($stmt->rowCount() > 0 ) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);

			$checkPassword = password_verify($password, $result['user_password']);

			// $checkPassword = true; // testing purposes. password_verify is mad because it's not hashed currently

			if ($checkPassword == false) {

				// wrong password
				return false;
			} 
			elseif ($checkPassword == true) {

				// success
				return true;
			}
			else {
				return false;
			}
		} else {

			// user not found
			return false;
		}

	}

	public function getAll () {

		$sql = "SELECT user_id, username FROM users ORDER BY user_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function getAllImages($userid) {

		$sql = "SELECT image FROM user_images WHERE image_owner = :imageOwner";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':imageOwner', $username);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

}
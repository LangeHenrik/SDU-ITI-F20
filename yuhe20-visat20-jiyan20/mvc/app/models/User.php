<?php
class User extends Database
{
	public function login()
	{
		$username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
		try {
			$sql = 'SELECT userid, email, username, pwd FROM users WHERE username = :username';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam('username', $username, PDO::PARAM_STR);
			$stmt->execute();
			$parameters = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($parameters as $value) {
				if ($value['username'] == $username && password_verify($password, $value['pwd'])) {
					$id = $value['userid'];
					$email = $value['email'];
					$_SESSION["logged_in"] = true;
					$_SESSION["username"] = $username;
					$_SESSION['id'] = $id;
					$_SESSION['email'] = $email;
					return true;
				} else {
					return false;
				}
			}
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage();
			return false;
		}
	}

	public function register()
	{
		$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_STRING);
		$username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
		try {
			$password_hashed = password_hash($password, PASSWORD_DEFAULT);

			$sql = 'INSERT INTO users (email, username, pwd) VALUES (:email, :username, :pwd)';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam('email', $email, PDO::PARAM_STR);
			$stmt->bindParam('username', $username, PDO::PARAM_STR);
			$stmt->bindParam('pwd', $password_hashed, PDO::PARAM_STR);
			$stmt->execute();
			return array("response" => "Registered successfully!");
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage();
			return false;
		}
	}


	public function getAll()
	{
		$sql = "SELECT username, userid FROM users";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public function getUsers($user)
	{
		$user = filter_var($user, FILTER_SANITIZE_STRING);
		$statement = "SELECT email, username FROM users";

		$stmt = $this->conn->prepare($statement);
		$stmt->execute();
		$users = $stmt->fetchAll();


		if ($user == "") {
			return $users;
		} else {
			$user = strtolower($user);
			$len = strlen($user);
			$specificUsers = array();
			foreach ($users as $name) {
				if (stristr($user, substr($name['email'], 0, $len)) || stristr($user, substr($name['username'], 0, $len))) {
					array_push($specificUsers, $name);
				}
			}
			return $specificUsers;
		}

		// 
	}
}
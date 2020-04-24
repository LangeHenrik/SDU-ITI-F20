<?php
class User extends Database
{
	public function login()
	{
		$username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
		try {
			$sql = 'SELECT user_id, name, username, password FROM user WHERE username = :username';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam('username', $username, PDO::PARAM_STR);
			$stmt->execute();
			$parameters = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($parameters as $value) {
				if ($value['username'] == $username && password_verify($password, $value['password'])) {
					$id = $value['user_id'];
					$name = $value['name'];
					$_SESSION["logged_in"] = true;
					$_SESSION["username"] = $username;
					$_SESSION['id'] = $id;
					$_SESSION['name'] = $name;
					return true;
				} else {
					return false;
				}
			}
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage(), "\n";
			return false;
		}
	}

	public function register()
	{
		$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
		$username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
		try {
			//hashed password
			$password_hashed = password_hash($password, PASSWORD_DEFAULT);
			//rdy sql
			$sql = 'INSERT INTO user (name, username, password) VALUES (:name, :username, :password)';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam('name', $name, PDO::PARAM_STR);
			$stmt->bindParam('username', $username, PDO::PARAM_STR);
			$stmt->bindParam('password', $password_hashed, PDO::PARAM_STR);
			$stmt->execute();
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage(), "\n";
			return false;
		}
	}


	public function getAll()
	{
		$sql = "SELECT username, user_id FROM user";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public function getUsers($user)
	{
		$user = filter_var($user, FILTER_SANITIZE_STRING);
		$statement = "SELECT name, username FROM user";
		//$users = talkToDB($statement, null);
		$stmt = $this->conn->prepare($statement);
		$stmt->execute();
		$users = $stmt->fetchAll();

		// lookup all hints from array if $q is different from ""
		if ($user == "") {
			return $users;
		} else {
			$user = strtolower($user);
			$len = strlen($user);
			$specificUsers = array();
			foreach ($users as $name) {
				if (stristr($user, substr($name['name'], 0, $len)) || stristr($user, substr($name['username'], 0, $len))) {
					array_push($specificUsers, $name);
				}
			}
			return $specificUsers;
		}

		// 
	}
}
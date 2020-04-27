<?php
class User extends Database {
	public function getAll () {

		$sql = "SELECT user_id, username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function doUserExists($username){
		$sql = "SELECT username FROM user WHERE username = :username;";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$users = $stmt->fetchAll();
		if (sizeof($users)==0){
			return true;
		} else {
			return false;
		}
	}

	public function register($username, $email, $password){
		$hashed_pwd = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user (username, email, password) VALUES (:username, :email, :password);";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $hashed_pwd);
		$stmt->execute();	

		return $username;
	}

	public function login($username, $password){
		{
			$sql = "SELECT * FROM user WHERE username = :username;";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			$users = $stmt->fetchAll();
			foreach ($users as $user) {
				$hashedPassword = $user['password'];
				if ($user['username'] == $username && password_verify($password, $hashedPassword)) {
					return true;
				} else {
					return false;
				}
			}
		}
	}
	public function getUserid($username){
		$sql = "SELECT user_id FROM user WHERE username = :username;";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			$str = $stmt->fetch();
			$user_id = '';
			foreach ($str as $user){
				$user_id = $user['user_id'];
			}
			return $user_id;
	}


}
<?php
class User extends Database {
	
	public function login($username){
		$sql = "SELECT username, password FROM user WHERE username = :username";
		
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		$result = $stmt->fetch(); //fetchAll to get multiple rows

		print_r($result);


		//todo: make an actual login function!!
		return true;
	}

	public function register() {

		$username = filter_var ( $_POST['username'], FILTER_SANITIZE_STRING);
		$password = filter_var ( $_POST['password'], FILTER_SANITIZE_STRING);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user (username, password) VALUES (:username, :password);";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $hashed_password);
		$stmt->execute();

		return $username;

	}


	public function getAll () {

		$sql = "SELECT user_id, username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

}
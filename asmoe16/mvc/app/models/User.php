<?php
class User extends Database {
	
	public function login(){
		if( !(isset($_POST['username']) && isset($_POST['password'])) ){
			return false;
		}

		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM user WHERE username = :username";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		$result = $stmt->fetch(); //fetchAll to get multiple rows
		if (isset($result['password']) && password_verify($password,$result['password']) ) {
			$_SESSION['logged_in'] = true;
			$_SESSION['username'] = $result['username'];
			$_SESSION['user_id'] = $result['user_id'];
			return true;
		}
		return false;
	}

	public function getAll () {

		$sql = "SELECT username FROM users";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function register() {
		$username = $_POST['username'];

		$sql = "SELECT username FROM user WHERE username = :username";
		$stmt = $this->conn->prepare($sql);

		$stmt->bindParam(':username',$username);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$exists = isset($result[0]['username']);
		if (!$exists) {
			$password = $_POST['password'];
			$hashed = password_hash($password,PASSWORD_DEFAULT);

			$sql = "INSERT INTO user (username,password) VALUES (:username,:password)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':password',$hashed);
			$stmt->execute();
		}

		return !$exists;
	}

}

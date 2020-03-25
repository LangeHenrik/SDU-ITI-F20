<?php
class User extends Database {

	public function login($username){
		$stmt = $this->conn->prepare('SELECT id_user, username, password, email FROM user WHERE username = :username');
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		$res = $stmt->fetch();
		return $res;
	}

	public function getAllApi(){
		$sql = "SELECT username FROM user";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result=$stmt->fetchAll();

		return $result; 
	}

	public function getAll ($q = null) {
		if($q == null){
		    $sql = "SELECT id_user, username, email FROM user";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
		}
		else{
			$q .= '%';
		    $sql = "SELECT id_user, username, email FROM user WHERE username LIKE :q";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(':q', $q, PDO::PARAM_STR);
			$stmt->execute();
		}
		return $stmt;
	}

	public function register($param_arr){
		$stmt= $this->conn->prepare("INSERT INTO user (username, password, email) VALUES ( ?, ?, ?)");
		return	$stmt->execute($param_arr);
	}

	public function checkUsernameDB ($username) {
		$stmt=$this->conn->prepare("SELECT username FROM user WHERE username=:username");
		$stmt->bindValue(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		$res = $stmt->rowCount();
		return $res;
	}

	public function checkMailDB ($email) {
		$stmt=$this->conn->prepare("SELECT email FROM user WHERE email=:email");
		$stmt->bindValue(':email', $email, PDO::PARAM_STR);
		$stmt->execute();
		$res = $stmt->rowCount();
		return $res;
	}
}

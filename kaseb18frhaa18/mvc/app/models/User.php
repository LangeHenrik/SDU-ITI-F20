<?php
class User extends Database
{
	public function login($username, $password)
	{
		try {
			$sql = 'SELECT user_id, name, username, passwordHash FROM person WHERE username = :username';
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam('username', $username, PDO::PARAM_STR);
			$stmt->execute();
			$parameters = $stmt->fetchAll(PDO::FETCH_ASSOC);

			foreach ($parameters as $value){
				if($value['username'] == $username && password_verify($password, $value['passwordHash'])){
					return true;
				}
			}
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage(), "\n";
			return false;
		}
	}

	public function register($name, $username, $password){
		try{
			//hashed password
			$password_hashed = password_hash($password, PASSWORD_DEFAULT);
			//rdy sql
			$sql = 'INSERT INTO person (name, username, passwordHash) VALUES (:name, :username, :password)';
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
}
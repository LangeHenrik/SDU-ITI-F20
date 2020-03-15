<?php

class UserModel extends DB
{
	public $username;
	public $name;
	public $email;
	public $phone;
	private $hash;

	public function fetch($username)
	{
		try {

			// query
			$query = $this->db->prepare("SELECT * FROM users WHERE username = :username");
			$query->bindParam(':username', $username);
			$query->execute();
			$row = $query->fetch(PDO::FETCH_ASSOC);

			// check if query succeeds
			if(!$row)
				return false;

			// get hashed password and other information
			$this->username = $row["username"];
			$this->name = $row["name"];
			$this->hash = $row["pswdhash"];
			$this->email = $row["email"];
		
		} catch (PDOException $e) {
		
			// die();
			echo "NOPE!";
			return false;

		}

		// return true if essential values are set
		return (isset($this->username) && isset($this->hash));
	}

	public function create($hash)
	{
		try {

			// prepare query
			$query = $this->db->prepare("INSERT INTO users(username, name, email, pswdhash) VALUES (:username, :name, :email, :hash)");
			
			// bind parameters (sanitize)
			$query->bindParam(':username', $this->username);
			$query->bindParam(':name', $this->name);
			$query->bindParam(':email', $this->email);
			$query->bindParam(':hash', $hash);
			
			// execute query
			$query->execute();
			return true;
		
		} catch (PDOException $e) {
		
			// die($e->getMessage());
			return $e->getMessage();
		}
	}

	public function authenticate($username, $password)
	{
		// fetch information (die if not successful)
		if (!$this->fetch($username))
			return false;

		// verify password with hash
		return password_verify($password, $this->hash);
	}
}
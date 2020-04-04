<?php
class User extends Database {
	
	public function login() {
		try 
		{
			$username = filter_var($_POST["username"], FILTER_SANITIZE_STRING); // Strip tags, optionally strip or encode special characters.
			$password = filter_var($_POST["password"], FILTER_SANITIZE_STRING); // Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].
			
			// Are either username or password empty?
			if (!$username || !$password) {
				return false;
			}

			$stmt = $this->conn->prepare("SELECT password, fullname FROM user WHERE username = :username");
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC); // FETCH_NUM -> returnerer array indexeret i colonner angivet i tal.                                         // Andre return methoder er beskrevet her: https://www.php.net/manual/en/pdostatement.fetch.php
			$result = $stmt->fetch();

			if ($result && password_verify($password, $result['password'])) { 
					$_SESSION['logged_in'] = true;
					$_SESSION['Fullname'] = $result['fullname'];
					$_SESSION['username'] = $_POST["username"];
					return true;
			} else { 
				return false;
			}
		}
		catch(PDOException $e)
		{ ?>
			Connection failed: <?=$e->getMessage()?> \n code <?=$e->getCode()?>
		<?php } 
	}

	public function getAll ($searchValue) {

		$sql = "SELECT username FROM user";

		$stmt = $this->conn->prepare($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function createUser() {
		
	}

}
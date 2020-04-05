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
			<br><p> Connection failed: <?=$e->getMessage()?><br/>code: <?=$e->getCode()?></p>;
		<?php } 
	}

	public function &getAll () {
		$searchValue = isset($_GET["searchValue"]) 	? filter_var($_GET["searchValue"], FILTER_SANITIZE_STRING)
													: NULL;
		$orderBy = $_GET["orderBy"] ?? "Username";
		try 
		{
			$stmtString = "SELECT username, fullname, signup_date FROM user";
			if ($searchValue != NULL) {
			$stmtString .= " WHERE ( username LIKE CONCAT('%', :username, '%')
								OR fullname LIKE CONCAT('%', :fullname, '%')
								OR signup_date LIKE CONCAT('%', :signup_date, '%'))";
			}
			$stmtString .= " ORDER BY $orderBy " . ($_GET["descCheck"] ?? "") . ";";
			$stmt = $this->conn->prepare($stmtString);
			if ($searchValue != NULL) {
				$stmt->bindParam(':username', $searchValue);
				$stmt->bindParam(':fullname', $searchValue);
				$stmt->bindParam(':signup_date', $searchValue);
			}
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_NUM);
			$users = $stmt->fetchAll();
			return $users;
		}
		catch(PDOException $e)
		{ ?>
			<br><p> Connection failed: <?=$e->getMessage()?><br/>code: <?=$e->getCode()?></p>;
		<?php }
	}

	public function createUser() {
		
	}

}
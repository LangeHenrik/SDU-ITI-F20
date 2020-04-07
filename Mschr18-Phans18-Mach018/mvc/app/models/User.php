<?php
class User extends Database {
	
	public function login() {
		try 
		{
			$username = $this->filter("username"); // Strip tags, optionally strip or encode special characters.
			$password = $this->filter("password"); // Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].
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
					$_SESSION['username'] = $username;
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
		$orderBy = isset($_GET["orderBy"]) ? filter_var($_GET["orderBy"], FILTER_SANITIZE_STRING) : "Username";
		try 
		{
			$stmtString = "SELECT username, fullname, signup_date FROM user";
			if ($searchValue != NULL) {
			$stmtString .= " WHERE ( username LIKE CONCAT('%', :username, '%')
								OR fullname LIKE CONCAT('%', :fullname, '%')
								OR signup_date LIKE CONCAT('%', :signup_date, '%'))";
			}
			$stmtString .= " ORDER BY $orderBy " . (isset($_GET["descCheck"]) ? filter_var($_GET["descCheck"], FILTER_SANITIZE_STRING) : "") . ";";
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
		try
		{
			array_filter($_POST, function(&$input) { $input = trim($input); });
			$fullname = filter_var($_POST["fullname"], FILTER_SANITIZE_STRING); // Strip tags, optionally strip or encode special characters.
			$username = filter_var($_POST["newusername"], FILTER_SANITIZE_STRING);
			$password = password_hash(filter_var($_POST["newpassword"], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT); // Hashing password right away.
			$phone = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);   // Remove all characters except digits, plus and minus sign.
			$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);        // Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].

			// Indset ny bruger.
			$stmt = $conn->prepare("INSERT INTO user (username, password, fullname, phone, email, signup_date)
									VALUES (:username, :password, :fullname, :phone, :email, now());");
			$stmt->bindParam(':username', $username);
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':fullname', $fullname);
			$stmt->bindParam(':phone', $phone);
			$stmt->bindParam(':email', $email);
			$result = $stmt->execute();

			echo "<script> console.log('User created with result: $result'); </script>" ;

			return $result == 1 ? true : false;
		}
		catch(PDOException $e)
		{ ?>
			<br><p> Connection failed: <?=$e->getMessage()?><br/>code: <?=$e->getCode()?></p>;
		<?php }
	}

	private function filter($name, $filter = FILTER_SANITIZE_STRING) {
		return filter_var($_REQUEST[$name], $filter);
	}
}
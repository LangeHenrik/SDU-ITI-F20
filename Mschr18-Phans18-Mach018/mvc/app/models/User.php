<?php
class User extends Database {

	public function login() {
		try
		{
			$username = User::filter("username"); // Strip tags, optionally strip or encode special characters.
			$password = User::filter("password"); // Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].
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
					$_SESSION['fullname'] = $result['fullname'];
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
		$searchValue = isset($_GET["searchValue"]) 	? User::filter("searchValue")
													: NULL;
		$orderBy = isset($_GET["orderBy"]) ? User::filter("orderBy") : "Username";
		$descCheck = isset($_GET["descCheck"]) ? User::filter("descCheck") : "";
		try
		{
			$stmtString = "SELECT username, fullname, signup_date FROM user";
			if ($searchValue != NULL) {
			$stmtString .= " WHERE ( username LIKE CONCAT('%', :username, '%')
								OR fullname LIKE CONCAT('%', :fullname, '%')
								OR signup_date LIKE CONCAT('%', :signup_date, '%'))";
			}
			$stmtString .= " ORDER BY :orderBy :descCheck;";
			$stmt = $this->conn->prepare($stmtString);
			if ($searchValue != NULL) {
				$stmt->bindParam(':username', $searchValue);
				$stmt->bindParam(':fullname', $searchValue);
				$stmt->bindParam(':signup_date', $searchValue);
			}
			$stmt->bindParam(':orderBy', $orderBy);
			$stmt->bindParam(':descCheck', $descCheck);
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
			$fullname = User::filter("fullname"); // Strip tags, optionally strip or encode special characters.
			$username = User::filter("newusername");
			$password = password_hash(User::filter("newpassword"), PASSWORD_DEFAULT); // Hashing password right away.
			$phone = User::filter("phone", FILTER_SANITIZE_NUMBER_INT);   // Remove all characters except digits, plus and minus sign.
			$email = User::filter("email", FILTER_SANITIZE_EMAIL);        // Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].

			// Indset ny bruger.
			$stmt = $this->conn->prepare("INSERT INTO user VALUES (NULL :username, :password, :fullname, :phone, :email, now());");
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

	public function usernameAvailable() {
		try
		{
			$newusername = User::filter('newusername');
			$stmtString = "SELECT username FROM user WHERE ( username = :newusername)";

			$stmt = $this->conn->prepare($stmtString);
			$stmt->bindParam(':newusername', $newusername);
			$stmt->execute();
			if($stmt->rowCount() > 0)
			{
				echo "exists";
			}
		}
		catch(PDOException $e)
		{ ?>
			<br><p> Connection failed: <?=$e->getMessage()?><br/>code: <?=$e->getCode()?></p>;
		<?php }
	}

	// Filter _POST or _GET requests with _REQUEST
	private static function filter($name, $filter = FILTER_SANITIZE_STRING) {
		return filter_var($_REQUEST[$name], $filter);
	}


	// API Fucktions

	public function apiGetUsers() {

		$stmtString = "SELECT userid AS 'user_id', username FROM user ";

		$stmt = $this->conn->prepare($stmtString);
		$stmt->execute();

		$stmt->setFetchMode( PDO::FETCH_ASSOC);
		$result = $stmt->fetchAll();

		return $result;
	}

}

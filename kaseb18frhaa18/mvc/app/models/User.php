<?php
class User extends Database
{	
	public function login($username, $password)
	{
		$username = $password = $name = "";
		$username_err = $password_err = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			//check if username is empty
			if (empty(trim($_POST["username"]))) {
				$username_err = "Please enter username.";
			} else {
				$username = filter_var(trim($_POST["username"]), FILTER_SANITIZE_STRING);
			}

			//check if password is empty
			if (empty(trim($_POST["password"]))) {
				$password_err = "Please enter password.";
			} else {
				$password = filter_var(trim($_POST["password"]), FILTER_SANITIZE_STRING);
			}

			//validate data
			if (empty($username_err) && empty($password_err)) {
				// Prepare a statement
				try {
					$sql = 'SELECT person_id, name, username, passwordHash FROM person WHERE username = :username';
					$parameters = array(array(":username", $username));
					$stmt = talkToDB($sql, $parameters);
					
					// Check if username exists, if yes then verify password
					if (count($stmt) == 1) {
						$row = $stmt[0];
						$id = $row["person_id"];
						$username = $row["username"];
						$name = $row["name"];
						$hashed_password = $row["passwordHash"];
						if (password_verify($password, $hashed_password)) {
							// Password is correct, so start a new session
							session_start();

							// Store data in session variables
							$_SESSION["loggedin"] = true;
							$_SESSION["id"] = $id;
							$_SESSION["username"] = $username;
							$_SESSION["name"] = $name;
							return true;

						} else {
							return false;
						}
					} else {
						// Display an error message if username doesn't exist
						$username_err = "No account found with that username.";
					}
					// Close statement

				} catch (Exception $e) {
					echo 'Caught exception: ', $e->getMessage(), "\n";
				}
			}
		$sql = "SELECT user_id, username FROM users";

			// Close connection
		}
	}

	public function getAll()
	{
		$sql = "SELECT username FROM users";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}
}

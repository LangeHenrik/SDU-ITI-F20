<?php

require_once 'db_config.php';

class Database extends db_config
{

	public $conn;

	public function __construct()
	{
		try {

			$this->conn = new PDO(
				"mysql:host=$this->servername;dbname=$this->dbname",
				$this->username,
				$this->password,
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
			);
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function __destruct()
	{
		$this->conn = null;
	}

	function talkToDB($statement, $parameters)
	{
		require_once 'db_config.php';

		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare($statement);
			if ($parameters !== null and is_array($parameters)) {
				foreach ($parameters as $value) {
					$stmt->bindParam($value[0], $value[1], PDO::PARAM_STR);
				}
			}
			$stmt->execute();

			// set the resulting array to associative
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetchAll();
			return $result;
		} catch (PDOException $e) {
			if ($e->errorInfo[1] == 1062) {
				return $e->errorInfo[1];
			} else {
				echo "Error: " . $e->getMessage();
			}
		}
	}
}

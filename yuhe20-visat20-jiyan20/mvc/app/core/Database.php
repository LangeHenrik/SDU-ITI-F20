<?php

require_once 'db_config.php';

class Database extends db_config
{
	public $conn;

	public function __construct()
	{
		try {

			$this->conn = new PDO(
				"mysql:host=$this->servername;port=$this->portdb;dbname=$this->dbname",
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
}

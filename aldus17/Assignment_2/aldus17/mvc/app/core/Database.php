<?php

require_once 'db_config.php';

class Database extends DB_Config
{

	public $conn;
	private $charset = "utf8";
	private $options = [
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES   => false,
	];

	public function __construct()
	{
		$dsn = 'mysql:host=' . DB_Config::$db_hostname . ';dbname=' . DB_Config::$db_name . ';charset=' . $this->charset;

		try {
			$this->conn = new PDO($dsn, DB_Config::$db_username, DB_Config::$db_password, $this->options);

			if ($this->conn == null) {
				echo 'no connection to database, pdoconnection is null';
				return false;
			}

			return $this->conn;
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
			echo "ERROR";
		}
	}

	public function __destruct()
	{
		$this->conn = null;
	}
}

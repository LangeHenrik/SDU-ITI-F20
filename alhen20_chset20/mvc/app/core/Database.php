<?php

require_once 'config.php';

class Database extends Config {

	public $conn;

	public function __construct() {
		try {

			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",
			$this->username,
			$this->password,
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function __destruct() {
		$this->conn = null;
	}

}
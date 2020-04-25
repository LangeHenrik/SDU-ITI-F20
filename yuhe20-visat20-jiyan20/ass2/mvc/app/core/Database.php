<?php

require_once 'db_config.php';
	
class Database extends DatabaseConfig {

	public $conn;
	
	public function __construct() {
		try {
			
			$this->conn = new PDO("mysql:host=$this->server;dbname=$this->database",
			$this->username_database,
			$this->password_database,
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	
	public function __destruct() {
		$this->conn = null;
	}
	
}
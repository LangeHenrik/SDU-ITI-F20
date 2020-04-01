<?php

require_once 'db_config.php';
	
class Database extends DB_Config {

	public $conn;
	
	public function __construct() {
		try {
			parent::__construct();
			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",
			$this->username,
			$this->password,
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			echo "<br><br> content of conn: " . ($this->conn == null ? "true" : "false") . "<br><br>";
			
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}
	
	public function __destruct() {
		$this->conn = null;
	}
	
}
<?php

require_once 'db_config.php';
	
class Database extends DB_Config {

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

	function query($query, $paramArray=[], $fetchMode = PDO::FETCH_ASSOC) {
	    $stmt = $this->conn->prepare($query);
	    $stmt->execute($paramArray);
	    if (strstr($query, 'SELECT')){
	        $stmt->setFetchMode($fetchMode);
	        return $stmt->fetchAll();
        }
	    return null;
    }
	
}
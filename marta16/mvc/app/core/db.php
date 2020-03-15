<?php

class DB
{
	public $db;

	public function __construct()
	{
		// load configuration
		require_once "config.php";

		// database configuration
		$dsn = "mysql:host=$db_host;dbname=$db_name;charset=$db_charset";
	
		$db_conf = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];
	
		// connect to database
		try
		{
			$this->db = new PDO($dsn, $db_user, $db_pswd, $db_conf);
		}
		catch(PDOException $ex)
		{
			die($ex);
		}
	}

	public function __destruct()
	{
		$this->db = null;
	}
}
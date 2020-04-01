<?php
class DB_Config {

	// Hej Henrik, skriv dine oplysninger her.
	protected $username = "";
	protected $password = "";
	protected $servername = "localhost";
	protected $dbname = "Mschr18_Phans18_Mach018";

	protected function __construct() {
		if (is_dir("C:\Users\madsw"))
		{
			$this->username = "root";
			$this->password = "password";
		}
		else if (is_dir("/Users/peterhansen"))
		{
			$this->$username = "root";
			$this->$password = "mysql";
		}
		else if (is_dir("C:\Users\Peter Hansen"))
		{
			$this->$username = "root";
			$this->$password = "mysql";
		}
		else if (is_dir("C:\Users\martin"))
		{
			$this->$username = "root";
			$this->$password = "martins login";
		}
	}
	
}

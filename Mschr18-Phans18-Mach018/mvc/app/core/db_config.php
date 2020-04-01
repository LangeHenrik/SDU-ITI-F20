<?php
class DB_Config {
	
	// Hej Henrik, skriv dine oplysninger her.
	protected $username = "root";
	protected $password = "password";    
	protected $servername = "localhost";
	protected $dbname = "MSchr18_Phans18_Mach018";
	
	protected function __construct() {

		if (is_dir("C:\Users\madsw")) 
		{
			$username = "root";
			$password = "password";
		}
		else if (is_dir("C:\Users\Peter Hansen"))
		{
			$username = "root";
			$password = "mysql";
		}
		else if (is_dir("C:\Users\martin"))
		{
			$username = "root";
			$password = "martins login";
		}

	}

/*
	protected $servername = 'localhost';
	protected $username = 'root';
	protected $password = 'root';
	protected $dbname = 'hela';
*/

}
	
	
	
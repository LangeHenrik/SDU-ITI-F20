<?php
 
//DB user account.
$db_user = 'root';
 
//DB password.
$db_password = 'root';
 
//The server that the DB is located on.
$db_host = 'localhost';
 
//The name of the database.
$db_name = 'test';
 
//Try to establish a connection to the db via the PDO object.
try{
    $db = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOEXCEPTION $e)
{
    $e->getMessage();
}

?>
<?php

include_once('db_config.php');

class DBConnection
{
    private $charset = "utf8";
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    public function openConnection()
    {
        $dsn = 'mysql:host=' . db_config::$db_hostname . ';dbname=' . db_config::$db_name . ';charset=' . $this->charset;

        try {
            $pdodbconnection = new PDO($dsn, db_config::$db_username, db_config::$db_password, $this->options);

            if ($pdodbconnection == null) {
                echo 'no connection to database, pdoconnection is null';
                return false;
            }
            
            return $pdodbconnection;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            echo "ERROR";
        }
    }

    public function closeConnection($db_connection)
    {
        $db_connection->close();
    }
}

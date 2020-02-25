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
            //$db_connection = new PDO('"mysql:host=$db_hostname;dbname=$db_name";charset=utf8"', $db_username, $db_password);
            // set the PDO error mode to exception
            //$db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            //$db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$db_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $pdodbconnection = new PDO($dsn, db_config::$db_username, db_config::$db_password, $this->options);

            if ($pdodbconnection == null) {
                echo 'no connection to database, pdoconnection is null';
                return false;
            }
            echo "Connected successfully to the database";

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

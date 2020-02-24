<?php

class DbConfig
{
    public function openConnection()
    {
        $db_hostname = "127.0.0.1";
        $db_username = "root";
        $db_password = "";
        $db_name = "users";


        try {
            $db_connection = new PDO('mysql:host=$db_hostname;dbname=$db_name";charset=utf8', $db_username, $db_password);
            // set the PDO error mode to exception
            $db_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db_connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Connected successfully";

            return $db_connection;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function closeConnection($db_connection)
    {
        $db_connection->close();
    }
}

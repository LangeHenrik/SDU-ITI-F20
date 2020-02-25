<?php
//include 'includes/autoload.php';
include "db_config.php";

class Dbh {
    private $dbconfig = null;
    
/*     private $host = "127.0.0.1";
    private $user = "root";
    private $pwd = "";
    private $dbName = "iti_assignment_01"; */

    private $charset = "utf8mb4";
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

public function __construct() {
    $this->dbconfig = new db_config;
}

    public function connect() {
        $dsn = 'mysql:host='. db_config::$servername . ';dbname=' . db_config::$dbName . ';charset=' . $this->charset;
        $pdo = '';
        try{
            $pdo = new PDO($dsn, db_config::$username, db_config::$password, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(),(int)$e->getCode());
        }
        return $pdo;  
    }
}

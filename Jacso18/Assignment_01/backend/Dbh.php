<?php

class Dbh {
    
    private $host = "127.0.0.1";
    private $user = "root";
    private $pwd = "";
    private $dbName = "iti_assignment_01";
    private $charset = "utf8mb4";
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function connect() {
        $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->dbName . ';charset=' . $this->charset;
        $pdo = '';
        try{
            $pdo = new PDO($dsn, $this->user, $this->pwd, $this->options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(),(int)$e->getCode());
        }
        return $pdo;  
    }
}

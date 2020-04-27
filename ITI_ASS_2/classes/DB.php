<?php
class DB {
    //singleton pattern to prevent reconnecting to DB over and over.
    private static $_instance = null;
    private $_pdo, //underscore notation says its private. Two underscores would mean protected.
            $_query, 
            $_error = false, 
            $_results, 
            $_count = 0;

    private function __construct() {
        try {
            $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            //echo 'Connected';
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if(!isset(self::$_instance)) { //if not the instance is set then...
            self::$_instance = new DB(); //...set the instance
        }
        return self::$_instance;
    }

    public function query($sql, $params = array()) {
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)) {
            $x = 1;
            if(count($params)) {
                foreach($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }

            if($this->_query->execute()) {
                //echo 'Success';
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }

        return $this;
    }

    public function action($action, $table, $where = array()) {
        if(count($where) === 3) {
            $operators = array('=', '>', '<', '>=', '<=');

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            if(in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?"; //same as saying ex.: "SELECT * FROM users WHERE username = 'Alex'";
                if(!$this->query($sql, array($value))->error()) {
                    return $this;
                }
            }
        }
        return false;

    }

    public function getAll($table) {
        return $this->query("SELECT * FROM $table");
    }

    public function get($table, $where) { //we want to 'get' from a 'table' 'where' something...
        return $this->action('SELECT *', $table, $where);
    }

    public function delete($table, $where) { //we want to 'delete' from a 'table' 'where' something...
        return $this->action('DELETE *', $table, $where);

    }
    public function insert($table, $fields = array()) {
        //if(count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;

            foreach($fields as $field) {
                $values .= '?';
                if($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }

            $sql = "INSERT INTO $table (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

            if(!$this->query($sql, $fields)->error()) {
                return true;
            }
        //}
        return false;
    }

    public function update($table, $id, $fields) {
        $set = '';
        $x = 1;

        foreach($fields as $name => $value) {
            $set .= "{$name} = ?";
            if($x < count($fields)) {
                $set .= ', ';
            }
            $x++;
        }

        $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

        if(!$this->query($sql, $fields)->error()) {
            return true;
        }

        return false;
    }

    public function results() {
        return $this->_results;
    }

    public function first() {
        return $this->results()[0];
    }

    public function error() {
        return $this->_error;
    }

    public function count() {
        return $this->_count;
    }
}
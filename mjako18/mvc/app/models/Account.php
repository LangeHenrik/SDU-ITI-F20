<?php
class Account extends Database {
  //public function __construct() {
    private $filters = array('username' => array('filter' => FILTER_VALIDATE_REGEXP,
                                                 'options' => array('regexp' => "/([a-zA-ZÆØÅæøå]|\d*|[!$&¤_-]*){4,}/")
                                                ),
                             'password' => array('filter' => FILTER_VALIDATE_REGEXP,
                                                 'options' => array('regexp' => "/^(?=(?:[^A-Z]*[A-Z]){1})(?=[^!$&¤_-]*[!$&¤_-])(?=(?:[^0-9]*[0-9]){1}).{8,}$/")));
  //}

  public function login($values) {
    $val = filter_var_array($values, $this->filters);
    $count_sql = "SELECT count(*) FROM account WHERE username = :username;";
    $stmt = $this->conn->prepare($count_sql);
    $stmt->bindparam(":username", $val['username']);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if($count > 0) {
      $sql = "SELECT id,password FROM account WHERE username = :username;";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindparam(":username", $val['username']);
      $stmt->execute();
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if(password_verify($val['password'], $row['password'])) {
          $_SESSION['name'] = $val['username'];
          $_SESSION['AccountID'] = $row['id'];
          $_SESSION['logged_in'] = true;
          return $row['id'];
        } else {
          return false;
        }
      }
    } else {
      return false;
    }
  }

  public function isLoggedIn() {
    if(isset($_SESSION['AccountID'])) {
      return true;
    } else {
      return false;
    }
  }

  public function logout() {
    session_destroy();
    unset($_SESSION['name']);
    unset($_SESSION['logged_in']);
    unset($_SESSION['AccountID']);
    return true;
  }

  public function checkUsername($values) {
    $username = $values['Username'];// sanitize missing
    $sql = "SELECT count(*) FROM account WHERE username = :Username";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(":Username", $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $db = null;
    if($count > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function createAccount() {
    $return = array();
    $val = filter_var_array(INPUT_POST, $this->filters);
    if(empty($val['username'])) {//!$username) {
       $return += ['error' => 'Invalid username. Username must be 4 characters long and can consist of letters(capital or not), numbers and these special characters: !$&¤_-'];
    }
    if(empty($val['password'])) {//!$password) {
       $return += ['error' => 'Invalid password. Password must be at least 8 characters long, consist of at least 1 capital letter, 1 number and 1 of the following special characters: !$&¤_-'];
    }
    if(!array_key_exists("error", $return)) {
      $hashPass = password_hash($val['password'], PASSWORD_DEFAULT);
      $sql = "INSERT INTO account (username, password) "
           . "VALUES(:Username, :Password);";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindparam(":Username", $val['userName']);
  /* These are not used currently, GDPR
      $stmt->bindparam(":Firstname", $firstName);
      $stmt->bindparam(":Lastname", $lastName);
      $stmt->bindparam(":Email", $email);
  */
      $stmt->bindparam(":Password", $hashPass);
      $stmt->execute();
      $rows = $stmt->rowCount();
      if($rows > 0) {
        return true;
      } else {
        return false;
      }
    } else {
      return $return;
    }
  }

  public function getAccountInfo() {
    $sql = "SELECT * FROM account WHERE id = :AccountID;";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindparam(":AccountID", $_SESSION['AccountID']);
    $stmt->execute();
    $returnVal = $stmt->fetch(PDO::FETCH_ASSOC);
    return $returnVal;
  }

  public function getAccountList() {
    $sql = "SELECT id as user_id, username FROM account ORDER BY id asc;";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    $returnVal = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $returnVal;
  }

  public function getUserId($values) {
    $returnVal = 0;
    $val = filter_var_array($values, $this->filters);
    $sql = "SELECT * FROM account WHERE username = :username;";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindparam(":username", $val['username']);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      if(password_verify($val['password'], $row['password'])) {
        $returnVal = $row['id'];
      }
    }
    return $returnVal;
  }
}

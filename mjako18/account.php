<?php
  require_once "./config.php";

class account {

  /**
   * Needs validation of $values
   */
  public function login($values) {
    $db = getDB();
    $username = $values['Username'];
    $email = $values['Username'];
    $pass = $values['Password'];
    $count_sql = "SELECT count(*) FROM accounts WHERE username = :username OR email = :email;";
    $stmt = $db->prepare($count_sql);
    $stmt->bindparam(":username", $username);
    $stmt->bindparam(":email", $email);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if($count > 0) {
      $sql = "SELECT id, firstname, lastname FROM accounts WHERE username = :username OR email = :email;";
      $stmt = $db->prepare($sql);
      $stmt->bindparam(":username", $username);
      $stmt->bindparam(":email", $email);
      $stmt->execute();
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if(password_verify($pass, $row['Password'])) {
          $_SESSION['name'] = $row['firstname'] .' '. $row['lastname'];
          $_SESSION['AccountID'] = $row['id'];
          $db = null;
          return true;
        } else {
          $db = null;
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
    unset($_SESSION['AccountID']);
    return true;
  }

  /**
   * Needs validation of $values
   */
  public function checkUsername($values) {
    $db = getDB();
    $username = $values['Username'];
    $sql = "SELECT count(*) FROM accounts WHERE username = :Username";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":Username", $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if($count > 0) {
      return true;
    } else {
      return false;
    }
    $db = null;
  }

  /**
   * Needs validation of $values
   */
  public function createAccount($values) {
    $db = getDB();
    $userName = $values['Username']; // webpage form
    $firstName = $values['Firstname']; // webpage form
    $lastName = $values['Lastname']; // webpage form
    $email = $values['Email']; // webpage form
    $password = $values['Password']; // webpage form
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO accounts (username, password, firstname, lastname, email) "
         . "VALUES(:Username, :Password, :Firstname, :Lastname, :Email);";
    $stmt = $db->prepare($sql);
    $stmt->bindparam(":Username", $userName);
    $stmt->bindparam(":Firstname", $firstName);
    $stmt->bindparam(":Lastname", $lastName);
    $stmt->bindparam(":Email", $email);
    $stmt->bindparam(":Password", $hashPass);
    $stmt->execute();
    $db =  null;
  }

  public function getAccountInfo() {
    $db = getDB();
    $sql = "SELECT * FROM accounts WHERE id = :AccountID;";
    $stmt = $db->prepare($sql);
    $stmt->bindparam(":AccountID", $_SESSION['AccountID']);
    $stmt->execute();
    $returnVal = $stmt->fetch(PDO::FETCH_ASSOC);
    $db = null;
    return $returnVal;
  }

  public function getAccountList() {
    $db = getDB();
    $sql = "SELECT id, username, firstname, lastname FROM accounts ORDER BY asc;";
    $stmt = $db->prepare($sql);
    $stmt-execute();
    $returnVal = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $db = null;
    return $returnVal;
  }
}

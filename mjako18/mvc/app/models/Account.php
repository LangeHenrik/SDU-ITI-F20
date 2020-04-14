<?php
class Account extends Database {
  public function login($values) {
    $username = $values['Username'];
    $pass = $values['Password'];
    $count_sql = "SELECT count(*) FROM account WHERE username = :username;";
    $stmt = $this->conn->prepare($count_sql);
    $stmt->bindparam(":username", $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if($count > 0) {
      $sql = "SELECT id,password FROM account WHERE username = :username;";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindparam(":username", $username);
      $stmt->execute();
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if(password_verify($pass, $row['password'])) {
          $_SESSION['name'] = $username;
          $_SESSION['AccountID'] = $row['id'];
          $_SESSION['logged_in'] = true;
          return true;
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
    $username = $values['Username'];
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

  public function createAccount($values) {
    $userName = $values['Username'];
/* These are not used currently, GDPR
    $firstName = $values['Firstname']; // webpage form
    $lastName = $values['Lastname']; // webpage form
    $email = $values['Email']; // webpage form
*/
    $password = $values['Password'];
    $hashPass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO account (username, password) "
         . "VALUES(:Username, :Password);";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindparam(":Username", $userName);
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

}

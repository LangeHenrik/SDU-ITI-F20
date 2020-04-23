<?php
$dbFile = '/Users/signethuesenpedersen/Documents/SDU-ITI-F20/siped18/mvc/app/core/Database.php';
require_once $dbFile;
class User extends Database
{
    public function login($username, $password)
    {
        $sql = "SELECT username AND uPassword FROM users WHERE username = :username";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(); //fetchAll to get multiple rows

        if (count($result) == 1) {
            $username = $row["username"];
            $uPassword = $row["uPassword"];
    
            if (password_verify($password, $uPassword)) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $username;
                header("Location: imagefeed.php");
            } else {
                $_SESSION['loggedIn'] = false;
                $errorMessage = "Wrong username or password";
            }
        }
        return false;
    }

    public function getAll()
    {
        $sql = "SELECT username  FROM users";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function checkLogin($username, $password) 
    {
    
        $sql = "SELECT uPassword FROM users WHERE username = :username";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch();

        if(isset($result))
        {
            return password_verify($password, $result);

        } else {
            return false;
        }
    }

    public function register()
    {  
        $chk_u = $conn->prepare("SELECT username FROM user WHERE username = :username");
        $chk_u->bindParam(':username', $username);
        
        $chk_e = $conn->prepare("SELECT email FROM user WHERE email = :email");
        $chk_e->bindParam(':email', $email);
        
        $chk_u->execute();
        $chk_e->execute();
        
        if ($chk_u->rowCount() > 0) 
        {
            print("Sorry ");
        } elseif ($chk_e->rowCount() > 0) {
            print("Sorry this email is already asign to a user");
        } else {
            $stmt = $conn->prepare("INSERT INTO user (firstname, lastname, username, email, password)
            VALUES (:firstname, :lastname, :username, :email, :password)");

            $stmt->bindParam(':firstname', $_POST['firstname']);
            $stmt->bindParam(':lastname', $_POST['lastname']);
            $stmt->bindParam(':username', $_POST['username']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':password', $_POST['password']);
            $result = $stmt->execute();
        }  
    }
}

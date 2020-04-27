<?php

class User extends Database
{

    public function login($username, $password)
    {
        $sql = "SELECT * FROM user WHERE username = ?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);

        $userlist = $stmt->fetchAll();

        if (isset($userlist[0])) {
            if (password_verify($password, $userlist[0]['password'])) {
                return $userlist[0]['userID'];
            }
        }
        return false;
    }

    public function create($name, $pass)
    {
        $username = filter_var($name, FILTER_SANITIZE_STRING);
        $password = filter_var($pass, FILTER_SANITIZE_STRING);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "SELECT username FROM user WHERE username=?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        $tmp = $stmt->fetch();
        if ($tmp) {
            return false;
        }

        $sql = "insert into user set username=?, password=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username, $hash]);
        return true;
    }

    public function getAll()
    {
        $sql = "SELECT userID, username FROM user";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $z = [];
        foreach ($result as $item) {

            array_push($z, ["user_id" => $item["userID"], "username" => $item["username"]]);
        }
        return $z;
    }

}
<?php


class Search extends Database
{

    public function searchForUser()
    {
        $userArray = array();

//Get user list
        $stmt = $this->conn->query("SELECT username FROM users");

        while ($row = $stmt->fetch()) {
            $userArray[] = $row;
        }

        $search = htmlspecialchars($_REQUEST["search"]);
        $hint = "";

        if ($search !== "") {

            $isFound = false;
            foreach ($userArray as &$value) {
                if (strtolower($value['username']) === strtolower($search)) {
                    $isFound = true;
                    $searchResult = "Match  found";
                }
            }
            if ($isFound === false) {
                $searchResult = "Match not found";
            }
        }

        return $searchResult;

    }
}


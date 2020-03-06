<?php

function talkToDB($statement, $parameters){
    require_once 'db_config.php';
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($statement);
        if($parameters!==null and is_array($parameters)){
            foreach($parameters as $value){
                $stmt->bindParam($value[0], $value[1], PDO::PARAM_STR);
            }
        }
        $stmt->execute();

    // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;

    }
    catch(PDOException $e) {
        if($e->errorInfo[1] == 1062){
            return $e->errorInfo[1];
        } else{
        echo "Error: " . $e->getMessage();
        }
    }
}

function talkToDBpls($statement, $parameter){
    require_once 'db_config.php';
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare($statement);
        $stmt->bindParam(":username", $parameter, PDO::PARAM_STR);
        $stmt->execute();

    // set the resulting array to associative
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;

    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null;
?>
<?php
require_once 'Include/db_config.php';
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Har vi en bruger med samme brugernavn?
    function trim_input(&$input) {
        $input = trim($input);
    }
    array_filter($_POST, 'trim_input');

    $inputArr =
    array("username" => filter_var($_POST["username"], FILTER_SANITIZE_STRING), // Strip tags, optionally strip or encode special characters.
          "password" => filter_var($_POST["password"], FILTER_SANITIZE_STRING)); // Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].

    // Indset ny bruger.
    $stmt = $conn->prepare("SELECT username, passw, fullname FROM users WHERE username = :username");
    $stmt->bindParam(':username', $inputArr["username"]);
    $result = $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_NUM); // FETCH_NUM -> returnerer array indexeret i colonner angivet i tal.
                                         // Andre return methoder er beskrevet her: https://www.php.net/manual/en/pdostatement.fetch.php
    $result = $stmt->fetchAll();

    print_r($result);

    $fetchetUsername = $result[0][0];
    $fetchetHashPasword = $result[0][1];
    $fetchetFullname = $result[0][2];

    if (password_verify($inputArr["password"], $fetchetHashPasword)) {
      echo "<br> welcome peter";
      $teststring = $inputArr['password'];
      echo "$teststring";
    }
    else {
      echo "<br> not welcome";
      $teststring = $inputArr['password'];
      echo "input $teststring ";
    }



    echo "<script> console.log('User created with result:'); </script>" ;

}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage() . ".\n code " . $e->getCode();
}
?>

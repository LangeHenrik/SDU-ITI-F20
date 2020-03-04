<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
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
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM); // FETCH_NUM -> returnerer array indexeret i colonner angivet i tal.                                         // Andre return methoder er beskrevet her: https://www.php.net/manual/en/pdostatement.fetch.php
    $result = $stmt->fetchAll();

    $rows = count($result);

    if ($rows < 1) {
      echo "<script>
              alert('Username is wrong');
              window.location= 'index.php';
            </script>";
    } else {
      $fetchetUsername = $result[0][0];
      $fetchetHashPasword = $result[0][1];
      $fetchetFullname = $result[0][2];

      if (password_verify($inputArr["password"], $fetchetHashPasword)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['Fullname'] = $fetchetFullname;
        header("location:feed.php");
      }
      else {
        echo "<script>
                alert('Pasword is wrong');
                window.location= 'index.php';
              </script>";
      }
    }
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage() . ".\n code " . $e->getCode();
}

$conn = null;
?>

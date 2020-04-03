<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once '../db_config.php';
try
{
    // Har vi en bruger med samme brugernavn?
    function trim_input(&$input) {
        $input = trim($input);
    }
    array_filter($_POST, 'trim_input');

    $inputArr =
    array("username" => filter_var($_POST["username"], FILTER_SANITIZE_STRING), // Strip tags, optionally strip or encode special characters.
          "password" => filter_var($_POST["password"], FILTER_SANITIZE_STRING)); // Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].

    $stmt = $conn->prepare("SELECT username, password, fullname FROM user WHERE username = :username");
    $stmt->bindParam(':username', $inputArr["username"]);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM); // FETCH_NUM -> returnerer array indexeret i colonner angivet i tal.                                         // Andre return methoder er beskrevet her: https://www.php.net/manual/en/pdostatement.fetch.php
    $result = $stmt->fetch();

    if (!$result) { ?>
      <script>
          alert('Username or Pasword is wrong');      // Username is wrong, but we wont tell
          window.location= '../../index.php';
      </script>
    <?php } else {
      $fetchetUsername = $result[0];
      $fetchetHashPasword = $result[1];
      $fetchetFullname = $result[2];

      if (password_verify($inputArr["password"], $fetchetHashPasword)) {
        $_SESSION['logged_in'] = true;
        $_SESSION['Fullname'] = $fetchetFullname;
        $_SESSION['username'] = $fetchetUsername;
        header("location:../../feed.php");
      }
      else { ?>
        <script>
            alert('Username or Pasword is wrong');    // Password is wrong, but we wont tell
            window.location= '../../index.php';
        </script>
      <?php }
    }
}
catch(PDOException $e)
{ ?>
    Connection failed: <?=$e->getMessage()?> \n code <?=$e->getCode()?>
<?php } 

$conn = null;
?>

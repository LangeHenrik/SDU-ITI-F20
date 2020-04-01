<?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  require_once('../db_config.php');

  try
  {
    if( isset( $_POST["deletebtn"] ) )
    {
      $picid = filter_var( $_POST["deletebtn"], FILTER_SANITIZE_NUMBER_INT );
      //echo "what is in deleteBtn? $picid";

      $stmt = $conn->prepare("DELETE FROM picture WHERE picid = :picid AND username = :username ;");
      $stmt->bindParam(':username', $_SESSION["username"]);
      $stmt->bindParam(':picid', $picid);
      $stmt->execute();
    }
    else
    {
      echo "<script> console.log('File(s) were not of correct type'); </script>" ;
    }
    header('location:../../upload.php');
  }
  catch(PDOException $e)
  {
      echo "<br>Connection failed: " . $e->getMessage() . ".\n code " . $e->getCode();
  }
  $conn = NULL;
?>

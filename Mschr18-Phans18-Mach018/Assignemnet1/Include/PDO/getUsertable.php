<?php
  $searchValue;
  $orderBy;
    if (isset($_GET["searchValue"])) {
      $searchValue = filter_var($_GET["searchValue"], FILTER_SANITIZE_STRING);
    } else {
      $searchValue = NULL;
    }
    if (isset($_GET["orderBy"])) {
      $orderBy = $_GET["orderBy"];
    }else {
      $orderBy = "Username";
    }
    require_once('Include/db_config.php');
    $result;
    try 
    {
        $stmtString = "SELECT username, fullname, signup FROM users";
        if ($searchValue != NULL) {
          $stmtString .= " WHERE ( username LIKE CONCAT('%', :username, '%')
                              OR fullname LIKE CONCAT('%', :fullname, '%')
                              OR signup LIKE CONCAT('%', :signup, '%'))";
        }
        $stmtString .= " ORDER BY $orderBy " . ($_GET["descCheck"] ?? "") . ";";

        $stmt = $conn->prepare($stmtString);
        
        if ($searchValue != NULL) {
          $stmt->bindParam(':username', $searchValue);
          $stmt->bindParam(':fullname', $searchValue);
          $stmt->bindParam(':signup', $searchValue);
        }

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_NUM); // FETCH_NUM -> returnerer array indexeret i colonner angivet i tal.
                                             // Andre return methoder er beskrevet her: https://www.php.net/manual/en/pdostatement.fetch.php
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e)
    { ?>
        <br><p> Connection failed: <?=$e->getMessage()?><br/>code: <?=$e->getCode()?></p>;
    <?php }

    if (!empty($result)) {
        $rows = count($result);
        $cols = count($result[0]);
        for ($i=0; $i < $rows; $i++) { ?>
            <tr>
            <?php for ($j=0; $j < $cols; $j++) { ?>
                <td>
                    <?=$result[$i][$j]?>
                </td>
            <?php } ?>
            </tr>
        <?php }
    }
    $conn = null;
?>

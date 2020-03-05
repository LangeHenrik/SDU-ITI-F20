<?php
    $searchValue = '20-10-10';
    if (DateTime::createFromFormat('Y-m-d h:m:s', $searchValue) !== FALSE) {
      $date = date_create($searchValue);
      $date = date_format($date, "Y/m/d");
      echo "string: $date is date!";
    }
    else {
      echo "string: $searchValue is not a date!";
    }
?>
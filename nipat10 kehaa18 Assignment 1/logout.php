<?php

//Start the session.
session_start();

//Release all set variables from session.
session_unset();

//Destroy the session.
session_destroy();

//Redirect to frontpage.
header("Location:index.php");
exit;
?>
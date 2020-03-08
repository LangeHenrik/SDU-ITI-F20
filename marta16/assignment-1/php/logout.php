<?php

// start session
session_start();

// logout
session_destroy();
session_unset();
unset($_SESSION["username"]);

?>

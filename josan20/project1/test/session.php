<?php
if (session_status() == PHP_SESSION_DISABLED)
    session_start();
$_SESSION["logged_in"] = TRUE;
echo "session";
print_r($_SESSION);
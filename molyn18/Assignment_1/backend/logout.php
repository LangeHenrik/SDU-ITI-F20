<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION["username"] = null;
header("location: ../index.html", true, 301);
exit;
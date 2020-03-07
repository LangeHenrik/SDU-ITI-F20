<?php
require 'session_guard.php';
if (!$_SESSION['logged_in']) {
	header("location:index.php?page=frontpage");
}
?>

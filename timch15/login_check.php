<?php
if ($_SESSION['logged_in'] != true) {
    header("Location: index.php");
}

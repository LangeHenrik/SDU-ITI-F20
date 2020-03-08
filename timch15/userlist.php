<?php
session_start();
require_once 'login_check.php';
require_once 'database_controller.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>ITI Ass.1 - User List</title>
    <meta name="viewport"  content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <nav>
        <?php include 'menu.php'; ?>
    </nav>

    <div class="wrapper">
        <div class="content">

        <h2>Users</h2>
        <table class="user-table">
            <?php get_users();?>
        </table>

        </div>
    </div>
</body>

</html>
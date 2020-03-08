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
        <?php include_once 'user_table_maker.php';
        ?>


        <h2>Users</h2>

        <form action="#" onsubmit="return showSearchResults()" method="post">
            <label for=text-input>Search for user </label>
            <input type="text" id=text-input>
            <input type="submit" name="submit" id="submit" />
        </form>

        <table class="user-table" id="user-table">
            <?php show_results(get_users());?>
        </table>

        </div>
    </div>

    <script>
        function showSearchResults() {
            var str = document.getElementById("text-input").value;

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("user-table").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "user_search.php?q=" + str, true);
            xmlhttp.send();

            return false;
        }
    </script>
</body>

</html>
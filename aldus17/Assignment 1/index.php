<?php

require_once('dbconfig/config.php');


?>
<!DOCTYPE html>

<header>
    <title>Frontpage</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index_page_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</header>

<body>
    <div id="main-wrapper">
        <h2 class="front_page-header">Index page</h2>
        <h3 class="front_page-subheader">Welcome to the index page <?php $_SESSION['username'] ?></h2>

            <form action="index.php" method="post">
                <div class="inner_container">
                    <button class="logout_button" type="submit">Log Out</button>
                </div>
            </form>
            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if ($_SESSION['logged_out'] == true) {
                header("Location: front_page.php");
            }

            ?>
    </div>
</body>


<footer id="index-footer">
    <p>Assignment 1 course ITI &amp; XI-IT - Aleksander Grzegorz Duszkiewicz (aldus17)</p>
</footer>

</html>
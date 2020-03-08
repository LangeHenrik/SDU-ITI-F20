<?php

session_start();
if (isset($_SESSION["username"])):

?>

<h1>Welcome, <?= $_SESSION["name"] ?>!</h1>
<p>Feel free to browse this website; uploads are found under the "Feed" page.</p>

<?php else: ?>

<h1>Welcome stranger!</h1>
<p>Please login or create a user in order to access the website's content.</p>

<?php endif; ?>

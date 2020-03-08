<?php
session_start();
// Create database connection
include 'config.php';
?>

<?php if($_SESSION["loggedin"] != 1): ?>
  <div id="menu" class="nav">
  <ul>
    <li><a href="../index.php">Frontpage</a></li>
    <li><a href="#" onclick="openModal()">Login</a></li>
  </ul>
</div>
<?php else: ?>
<div id="menu" class="nav">
  <ul>
    <li><a href="../index.php">Frontpage</a></li>
    <li><a href="../php/imagepage.php">Image feed</a></li>
    <li><a href="../php/upload.php">Upload page</a></li>
    <li><a href="../php/users.php">Users</a></li>
    <li><a href="#" onclick="openModal()">Login</a></li>
  </ul>
</div>
<?php endif; ?>
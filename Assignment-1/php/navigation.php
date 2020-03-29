<?php
if(session_status() === "PHP_SESSION_NONE") {
  session_start();
}
// Create database connection
include 'config.php';
?>

<?php if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]  != true): ?>
<div id="menu" class="nav">
  <ul>
    <li><a href="../index.php">Frontpage</a></li>
    <li><a href="#" onclick="openModal()">Login</a></li>
  </ul>
</div>
<?php else: ?>
<div id="menu" class="nav">
  <ul>
    <li>
      <a href="../index.php"><i class="fas fa-home"></i> <span class="link-text">Frontpage</span> </a>
    </li>
    <li>
      <a href="../php/imagepage.php"> <i class="fas fa-images"> </i> <span class="link-text"> Image feed </span></a>
    </li>
    <li>
      <a href="../php/upload.php"><i class="fas fa-upload"></i> <span class="link-text">Upload page</span></a>
    </li>
    <li>
      <a href="../php/users.php"><i class="fas fa-users"></i> <span class="link-text">Users</span></a>
    </li>
    <li>
      <a href="#" onclick="openModal()"
        ><i class="fas fa-sign-in-alt"></i> <span class="link-text">Login</span></a
      >
    </li>
  </ul>
</div>
<?php endif; ?>

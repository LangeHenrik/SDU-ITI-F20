<nav class="mainnav" id="mainnav">
  <ul>
    <li><a href="feed.php">ChalkBoard-Feed</a></li>
    <li><a href="upload.php">Upload</a></li>
    <li><a href="users.php">Users</a></li>
    <li>
      <form action="Include/phpUtils/logout.php" >
        <label for="logout"><?php echo $_SESSION['Fullname'] . " : " . $_SESSION['username'] . " "?></label>
        <input type="submit" name="logout" id="logout" value="Log out"/>
      </form>
    </li>
  </ul>
</nav>

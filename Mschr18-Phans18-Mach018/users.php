<?php
  include_once('header.php');
  include_once('401.php');
?>
    <section id="content">
      <h1 id="title">Users on </h1> <?php include_once('Include/phpUtils/chalkbord.php') ?>
      <div class="users" id="users">
        <form>
              <input type="text" id="searchValue" name="searchValue" placeholder="Enter search here. . .">
              <input type="submit" id="submit" value="Search">
              <br> Orderd by
              <select name="orderBy" id="orderBy">
                <option value="username" selected="selected">Username</option>
                <option value="fullname">Fullname</option>
                <option value="signup">Signup Date</option>
              </select>
          </form>
        <table>
          <tr>
            <th>Username</th>
            <th>Fullname</th>
            <th>Signup Date</th>
          </tr>
          <?php include_once('Include/PDO/getUsertable.php'); ?>
        </table>

      </div>
    </section>

<?php
 include_once('footer.php');
?>

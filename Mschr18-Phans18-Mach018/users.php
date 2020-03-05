<?php
  include_once('header.php');
  include_once('authendicate.php');
?>
    <section id="content">
        <div class="users" id="users">
          <h1 id="title">Users on </h1> <?php include_once('Include/chalkbord.php') ?>

          <form>
                <input type="text" id="searchValue" name="searchValue" placeholder="Enter search here. . .">
                <input type="submit" id="submit" value="Search">
                 Orderd by
                <select name="orderBy" id="orderBy">
                  <option value="username" selected="selected">Username</option>
                  <option value="fullname">Fullname</option>
                </select>
            </form>
          <table>
            <tr>
              <th>Username</th>
              <th>fullname</th>
            </tr>
            <?php include_once('usertable.php'); ?>
          </table>

        </div>
    </section>

<?php
 include_once('footer.php');
?>

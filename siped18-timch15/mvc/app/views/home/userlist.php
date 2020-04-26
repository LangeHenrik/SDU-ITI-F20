<?php include '../app/views/partials/menu.php'; ?>

<h2>Users</h2>

<form>
    <input type="text" id="searchValue" name="searchValue" value="<?=$_GET["searchValue"] ?? ""?>"
    autofocus placeholder="Enter search here. . .">
    <input type="submit" id="submit" value="Search">
</form>

<table class="user-table" id="user-table">
        <thead>
          <tr>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if (!empty($viewbag)) {
              $rows = count($viewbag);
              $cols = count($viewbag[0]);
              for ($i=0; $i < $rows; $i++) {
          ?>
            <tr>
              <?php for ($j=0; $j < $cols; $j++) { ?>
                <td>
                  <?=$viewbag[$i][$j]?>
                </td>
              <?php } ?>
            </tr>
          <?php } } ?>
        </tbody>
      </table>




<script src="/siped18-timch15/mvc/public/js/searchResults.js"></script>

<?php include '../app/views/partials/foot.php'; ?>
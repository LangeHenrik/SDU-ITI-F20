<?php
  $_SESSION['page_titel'] .= " | Users";
  $_SESSION['page_header::before'] = "";
  $_SESSION['page_header::after'] = " Users.";
  $_SESSION['page_sub_header'] = "Follow image feed for updates whenever new stories are uploaded.";

  include_once('../app/views/partials/header.php');
?>
  <div class="page container-fluid custom-container">
    <div class="container">
      
      <form action="<?=BASE_URL?>Home/users/">
        <div class="form-row align-items-center">
          <div class="col-auto">
            <label for="searchValue">Search value</label>
            <input type="text" class="form-control" id="searchValue" name="searchValue" value="<?=$_GET["searchValue"] ?? ""?>"
            autofocus placeholder="Enter search here. . ." onfocus="this.selectionStart = this.selectionEnd = this.value.length;">
          </div>
          <div class="col-auto ">
            <button type="submit" class="btn btn-primary costum-mt-32">Search</button>
          </div>
          <div class="col-auto">
            <label for="orderBy">Order by</label>
            <select class="form-control" name="orderBy" id="orderBy">
              <option value="username">Username</option>

              <?php if ($_GET["orderBy"] == "fullname") {?>
                <option value="fullname" selected>Fullname</option>
              <?php } else {?>
                <option value="fullname">Fullname</option>

              <?php } if ($_GET["orderBy"] == "signup") {?>
                <option value="signup" selected>Signup Date</option>
              <?php } else {?>
                <option value="signup">Signup Date</option>
              <?php } ?>
            </select>
          </div>
          <div class="col-auto">
            <div class="form-check costum-mt-32">
              <input class="form-check-input" type="checkbox" name="descCheck" id="descCheck"  value="DESC"<?=isset($_GET["descCheck"]) ? " checked" : ""?>>
              <label class="form-check-label" for="descCheck">Descending</label>
            </div>
          </div>
        </div>
      </form>

      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th>Username</th>
            <th>Fullname</th>
            <th>Signup Date</th>
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

    </div>
  </div>

<?php
 include_once('../app/views/partials/footer.php');
?>

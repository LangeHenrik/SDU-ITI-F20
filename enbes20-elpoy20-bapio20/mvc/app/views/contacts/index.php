<div class="container_userlist">
  <div class="title"><?= $viewbag['title'] ?></div>
  <!-- AJAX Call to refresh the user list (showUser)  -->
  <div class="search_field" method="get">
    Search a user by Username: <br> <br> <input type="text" name='q' onkeyup="showUser(this.value)">
  </div>
  <br> <br>
  <hr> <br>
  <div class="user_list" id="txtHint">
    <?php //echo($viewbag['output_userlist']); ?>
    <?php foreach ($viewbag["output_userlist"] as $row):?>
    <div class='user_card'>
      <ul class=''>
        <li>
          <div>Username : <?php echo $row["username"] ?></div>
          <div>Email : <?php echo $row["email"] ?></div>
        </li>
      </ul>
    </div>
    <?php endforeach ?>
  </div>
</div>
</div>

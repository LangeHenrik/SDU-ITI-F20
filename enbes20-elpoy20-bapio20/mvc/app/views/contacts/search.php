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

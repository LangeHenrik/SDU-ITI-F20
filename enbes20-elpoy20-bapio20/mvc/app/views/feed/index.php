<div class="container_feed">
  <div class="title"><?= $viewbag['title'] ?></div>
  <div class="cards-list">
    <?php foreach ($viewbag["output_userlist"] as $row):?>
    <div class='card'>
      <div class='card_title title-white'>
        <p><?php echo $row["header"] ?></p>
      </div>
      <div class='card_image'>
        <img src=<?php echo $row["image"] ?>>
      </div>
      <div class='message'>
        <div><?php echo $row["description"] ?></div>
        <div class='messageinfo'>
          <div id='first'><i>Upload by : <?php echo $row["username"] ?></i></div>
          <div id='second'><?php echo $row["created"] ?></div>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>

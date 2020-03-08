<?php
  include_once('header.php');
  include_once('401.php');
?>
    <section id="content">
      <h1 id="title">Feed </h1> <?php include_once('Include/phpUtils/chalkbord.php') ?>
      <div class="feed" id="feed">

        <?php
          include_once('include/PDO/getUploadedImages.php');
        ?>
        
      </div>
    </section>

<?php
 include_once('footer.php');
?>

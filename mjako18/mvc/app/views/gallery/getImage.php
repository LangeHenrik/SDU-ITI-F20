<?php include '../app/views/partials/menu.php'; ?>
<section>
  <div class="container-fluid fixed-nav">
    <div class="col-xl-8 col-m-8" id="gallery">
      <div class="gallery_left">
        <h3><?php echo $viewbag["caption"] ?></h3>
        <p><?php echo $viewbag["description"] ?></p>
        <p><?php echo $viewbag["username"] ?></p>
        <img class="horisontal-gallery" src="<?php echo DOC_ROOT."/".$viewbag["image_name"] ?>" />
        <img class="horisontal-gallery" src="data:<?php echo $viewbag["mimetype"].";base64,".$viewbag["img"] ?>">
      </div>
    </div>
    <div class="col-xl-4 col-m-4">
    <?php include '../app/views/partials/logoutform.php' ?>
    </div>
  </div>
</section>
<?php include '../app/views/partials/foot.php'; ?>

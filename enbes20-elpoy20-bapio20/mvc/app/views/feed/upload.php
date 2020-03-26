<div class="uploadpage">
  <div class="container_upload">
    <div class="title"><?= $viewbag['title'] ?></div>
    <form method="post" class="form" action="" enctype='multipart/form-data'>
      <?php
        if(isset($viewbag['error'])) {
            echo '<p id="verif_fail" >'.$viewbag['error']."</p>";
        }
        if(isset($viewbag['success'])){
          echo '<p id="verif_ok" >'.$viewbag['success']."</p>";
        }?>
      <!-- <p>Drag your picture here or click on this area</p> -->
      <input type="file" name="file" id="file" required="required">
      <label for="header">Header</label>
      <input type='text' name='header' />
      <label for="description">Description</label>
      <input type='text' name='description' />

      <input type='submit' value='Upload Image' name='formUpload'>
    </form>
  </div>
</div>
</div>

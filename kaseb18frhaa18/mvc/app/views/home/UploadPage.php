<?php include '../app/views/partials/header.php'; ?>

<div class="wrapper">
  <div class="content">
    <form method="post" action="" enctype='multipart/form-data'>
      <input type="text" name="head" placeholder="Enter a header for your upload!">

      <textarea placeholder="Give your upload a small discription!" name="description" id="description" cols="30" rows="10"></textarea>

      <input type="file" name='file'>

      <button type="submit" value="Upload" name="upload">Upload now</button>
    </form>
  </div>
</div>
</body>
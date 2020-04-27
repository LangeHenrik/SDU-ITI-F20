<?php 
include '../app/views/partials/menu.php';
?>
<head> <script src="../js/refreshPics.js"></script> </head>

<body>
<div class="wrapper">        
<div class="refreshbtn">
<input  type="button" id="button" value="Refresh" class="button" onclick="refreshPics();" ></input> 
</div>
<div class="content" id="content">
    <?php 
        $images = $viewbag['images'];
        foreach ($images as $img){ 
    ?>
    <div class="person">
    <p class="title"> <?php echo $img['title']; ?> - <?php echo $img['user_id']; ?> </p>
    <p class="description"> <?php echo $img['description']; ?> </p>
    <img src=" <?php echo $img['image']; ?>"  alt="error"/>  
    <br/>
   </div>
          <?php  }; ?>
</div>

<?php 
include '../app/views/partials/foot.php';
?>

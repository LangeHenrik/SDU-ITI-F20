<!-- Login form -->
<div id="main-content" >
    <div class="container">
        <div class="title"><?= $viewbag['title']?></br></div>
        <?php
          if(isset($_SESSION['id'])){
              echo '<h2>Welcome '. $_SESSION['username'] .'</h2>
                    <a href="'.URL.'feed">Feed Page</a>';
          }
          else{
              echo '<h3>Please Login to continue!</h3>
                    <a href="'.URL.'home/login">login</a>';
          }
        ?>
    </div>
</div>

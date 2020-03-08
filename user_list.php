<?php
  session_start();
  require "header.php";
?>

    <?php
        if(isset($_SESSION['username'])){
            echo "<a href='logout.php'></a>";
        } else{
            echo "<script> alert('You have to login to use this function!') </script>";
            echo "<script> location.href = 'index.php' </script>";
        }
    ?>      <div class="content">
                <h1>WELCOME TO THE USER LIST PAGE</h1>
                <h3>BELOW YOU CAN FIND ALL OF THE REGISTERED USERS</h3>
                <?php include './linkdatabase/fetchuserdata.php';?>
            </div>
        </body>
</html>
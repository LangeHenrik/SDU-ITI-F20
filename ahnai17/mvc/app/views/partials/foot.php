</div>
<?php
if (isset($_SESSION['logged_in'])){
 ?>
   Welcome <?=$viewbag['username']?>
<?php
}
?>
</body>
</html>
</div>
<?php
if (isset($_SESSION['logged_in'])){
 ?>
   welcome <?=$viewbag['username']?>
<?php
}
?>
</body>
</html>
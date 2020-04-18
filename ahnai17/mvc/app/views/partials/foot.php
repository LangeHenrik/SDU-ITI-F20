</div>
<?php
if (isset($_SESSION['logged_in'])){
    echo "Welcome " . $_SESSION['username'];
 ?>
<?php
} else {
?>
    <form class="form-group">
        <a href="/ahnai17/mvc/public/home/Home_page" class="btn btn-primary">Home</a>
    </form>
<?php
}
?>
</body>
</html>
<?php include '../app/views/partials/header.php';
if (isset($_SESSION['logged_in'])==false){?>
    <form class="form-group">
        <a href="/ahnai17/mvc/public/home/Login_page" class="btn btn-primary">Login page</a>
    </form>

<?php
}

?>
<?php include '../app/views/partials/foot.php'; ?>
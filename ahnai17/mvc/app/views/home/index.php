<?php include '../app/views/partials/header.php';
if (isset($_SESSION['logged_in'])==false){?>
    <form class="form-group">
        <a href="/ahnai17/mvc/public/home/Login_page" class="btn btn-primary">Login page</a>
    </form>

<?php
} else {
?>
<form class="form-group" method="get" action="/ahnai17/mvc/public/home/getImages">
    <button type="submit" class="btn btn-primary">Show images</button>
</form>
<?php }
include '../app/views/partials/foot.php'; ?>
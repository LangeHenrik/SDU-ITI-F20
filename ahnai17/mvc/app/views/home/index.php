<?php include '../app/views/partials/header.php';
if (isset($_SESSION['logged_in'])==false){?>
    <form class="form-group">
        <a href="/ahnai17/mvc/public/home/Login_page" class="btn btn-primary">Login page</a>
    </form>

<?php
} else {
?>
<form class="form-group" method="post" action="/ahnai17/mvc/public/image/getImages">
    <button type="submit" class="btn btn-primary">Show images</button>
    <input type="text" placeholder="Search userId" name="search_userid"
        onchange="SearchUser(this.value) " id="search_userid">
    <div id="show_user"></div>
</form>
<script src="/ahnai17/mvc/public/js/SearchUser.js"></script>
<?php }
include '../app/views/partials/foot.php'; ?>
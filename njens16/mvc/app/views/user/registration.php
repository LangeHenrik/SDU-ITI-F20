<?php 
include "../app/views/partials/head.php"; 
include '../app/views/partials/menu.php';
?>

<div class="container">
    <div class ="row">
        <div class ="col-4">
        <br>
        </div>
        <div class ="col-4" >
        <br>
        <span id="regForm"> </span>
        <?php if ($viewbag["errMsg"] == "Error creating user"): ?>
        <div id="error" class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong><?=$viewbag["errMsg"]?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <form onsubmit="return checkFields()" action="/njens16/mvc/public/user/register" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="username" aria-describedby="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <small id="passwordHelp" class="form-text text-muted">Password must be more than 8 charecters and contain both small and LARGE letters, a number and a charecter.</small>
            </div>
        <button id="click" type="submit" class="btn btn-primary">Register</button>
        </form>
        </div>
    </div>
</div>
<script src="../js/cleanInput.js"></script>

<script type='text/javascript'>
$(window).load(function(){
    $("#click").click(function() {
        $("#error").html('Hello World!').removeClass("hide").hide().addClass("show").fadeIn("slow");
    });
});
</script>
<?php include '../app/views/partials/foot.php'; ?>

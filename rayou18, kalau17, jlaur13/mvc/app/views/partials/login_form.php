<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <?php include '../app/views/partials/header.php' ?>
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="/rayou18, kalau17, jlaur13/mvc/public/styles/loginform_style.css">

</head>
<body>
    <div class="login-form">
        <form action="/rayou18, kalau17, jlaur13/mvc/public/Home/login" method="POST">
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Login</button>
            </div>
        </form>
        <p class="text-center">
            <a href="/rayou18, kalau17, jlaur13/mvc/public/Home/signup">Create an Account</a>
        </p>
        <?php if (isset($viewbag['wrongLogin'])) { ?>
            <p class="text-center wrong_info">
                <?php echo $viewbag['wrongLogin']; ?>
            </p>
        <?php } ?>
    </div>
</body>
</html>
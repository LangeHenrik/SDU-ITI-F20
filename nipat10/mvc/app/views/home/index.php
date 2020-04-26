<?php include '../app/views/partials/menu.php'; ?>

<div class="main" align="center">
        <div class="wrapper" id="loginform" >
            <h2> Login form</h2>
                <!-- Register form that passes login request via POST. --->
                <form action="/nipat10/mvc/public/user/login" method="post">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" required placeholder="username"><br>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off" required placeholder="Password"><br>
                    <input type="submit" name="login" value="Login"></button>
                </form>
    
            </div>
            <!-- Simple Ajax call Here -->
            <div id="ajax">
        <p> Click here to see developers</p>
    </div>
    <button id="btn">
        Click here
    </button>
</div>

<?php include '../app/views/partials/foot.php'; ?>
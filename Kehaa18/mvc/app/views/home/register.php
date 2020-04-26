<?php include '../app/views/partials/menu.php'; ?>

<div class="main" align="center">
        <div class="wrapper" id="loginform" >
            <h2> Register form</h2>
                <!-- Register form that passes register request via POST. --->
                <!-- OnSubmit will call a javascript to perform a Regex check -->
                <form action="/nipat10/mvc/public/user/register" method="post" onsubmit="validate(this)">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" required placeholder="username"><br>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off" required placeholder="Password"><br>
                    <input type="submit" name="register" value="Register"></button>
                </form>
    
            </div>
    
</div>

<?php include '../app/views/partials/foot.php'; ?>
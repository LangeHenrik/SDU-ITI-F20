<?php include '../app/views/partials/menu.php'; ?>

<div class="main" align="center">
        <div class="wrapper" id="loginform" >
            <h2> Register form</h2>
                <!-- Register form that calls the document itself (register.php) and sends the information via POST. --->
                <form action="../user/register" method="post" onsubmit="validate(this)">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" autocomplete="off" required placeholder="username"><br>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off" required placeholder="Password"><br>
                    <input type="submit" name="register" value="Register"></button>
                </form>
    
            </div>
    
</div>

<?php include '../app/views/partials/foot.php'; ?>
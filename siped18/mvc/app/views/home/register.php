<?php include '../app/views/partials/menu.php'; ?>
<body>
    <div class="login-page">
        <div class="form">
            <form onsubmit="return checkForm();" method="POST" onchange="saveuser" >
                <label for="firstname">Firstname</label><br>
                <input type="text" name="firstname" id="firstname" placeholder="Your first name..">
                <p class="info" id="firstnameinfo"></p>

                <label for="lastname">Lastname</label><br>
                <input type="text" name="lastname" id="lastname" placeholder="You last name..">
                <p class="info" id="lastnameinfo"></p>

                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" placeholder="You username..">
                <p class="info" id="usernameinfo"></p>

                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" placeholder="You email..">
                <p class="info" id="emailinfo"></p>

                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="You password..">
                <p class="info" id="passwordinfo"></p>

                <button type="submit" name="submit">Sign up</button> 
            </form>
        </div>
    </div>

</body>
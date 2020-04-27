<?php
    $title = "Login";
    include_once "../app/views/partials/Navbar.php";
?>
<div class="center container">
    <form method="post">
        <fieldset>
            <legend>Login to Facewall</legend>
                <label for="username">Username</label> <br/>
                <input type="text" name="username" placeholder="Username"> <br/>
                <label for="password">Password</label> <br/>
                <input type="password" name="password" placeholder="Password"><br/>
                <button type="submit">Submit</button>
                <?php if (isset($viewbag['error'])){ print"<br/>". $viewbag['error'];}?>
                <hr/>
                Don't have a user? Make one <a href="/akvis18/mvc/public/home/Register">here</a>.
        </fieldset>
    </form>
</div>

</body>
</html>
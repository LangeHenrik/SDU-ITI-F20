
<?php include '../app/views/partials/menu.php'; ?>

<div class = wrapper> 
        <h1> Registration page </h1>
       
        <form class="Signup form" action ="/jonas18/mvc/public/home/register" method="POST">
        <label for="username"> Username:</label> <br>
        <input type="text" name="username" placeholder="username"> <br>
        <label for="password"> password:</label> <br>
        <input type="password" name="pwd" placeholder="password"> <br>
        <label for="email"> email:</label> <br>
        <input type="text" name="email" placeholder="email"> <br>
        <button type="submit" name="Signup">Signup</button>
        </div>
		
<?php include '../app/views/partials/foot.php'; ?>
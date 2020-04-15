<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #007acc;">

    <div class="container">
    <a class="navbar-brand" href="/njens16/mvc/public/home/frontpage">Assignment 2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) : ?>
            <li class="nav-item <?php if($viewbag["page"] == "home"): ?>active<?php endif; ?>">
            <a class="nav-link" href="/njens16/mvc/public/home/frontpage">Home</a>
            </li>
            <li class="nav-item  <?php if($viewbag["page"] == "images"): ?>active<?php endif; ?>">
                <a class="nav-link" href="/njens16/mvc/public/home/images">Images</a>
            </li>
            <li class="nav-item <?php if($viewbag["page"] == "users"): ?>active<?php endif; ?>">
                <a class="nav-link" href="/njens16/mvc/public/user/users">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/njens16/mvc/public/user/logout">Log out</a>
            </li>
<?php else:; ?>
             <li class="nav-item <?php if($viewbag["page"] == "login"): ?>active<?php endif; ?>">
                <a class="nav-link" href="/njens16/mvc/public/user/login">Login</a>
           <li class="nav-item <?php if($viewbag["page"] == "register"): ?>active<?php endif; ?>">
                <a class="nav-link" href="/njens16/mvc/public/user/register">Register</a>
<?php endif; ?>
       </ul>
    </div>
    </div>
</nav>




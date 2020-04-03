<nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="Home">
    <?php include('../app/views/partials/chalkbordlogo.php') ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto" >
      <li class="nav-item">
        <a class="nav-link" href="Home">Home <i class="fas fa-home"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="Registration">Sign up <i class="fas fa-user-plus"></i></a>
      </li>
    </ul>
    <?php
      include('loginform.php');
     ?>
  </div>
</nav>



<!--
<ul class="navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Features</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Pricing</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>
-->

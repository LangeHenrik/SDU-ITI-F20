<div class="bg" id="modalBackground">

  <div class="container" id="container">
    <div id="closeButton" onclick="closeModal()">
      <i class="fas fa-window-close"></i>
    </div>
    <div class="form-container sign-up-container">
      <?php
      require "php/registration.php";
      ?>
    </div>
    <div class="form-container sign-in-container">
      <form action="#">
        <h1>Sign in</h1>
        <input type="email" placeholder="Email" />
        <input type="password" placeholder="Password" />
        <a href="#">Forgot your password?</a>
        <button>Sign In</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <div class="overlay-text">
            <p>To keep connected with us please login with your personal info</p>
          </div>
          <button class="ghost" id="signIn">Sign In</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <div class="overlay-text">
            <p>Enter your personal details and start journey with us</p>
          </div>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

</div>
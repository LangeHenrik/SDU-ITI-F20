<!DOCTYPE html>
  <head>
    <title>Lecture 3</title>
    <link rel="icon" href="../Assignment1/img/icon.png" type="png" />
    <link rel="stylesheet" type="text/css" href="Stylesheet.css">
  </head>

  <body>
    <h2>Log in</h2>

    <button onclick="document.getElementById('formid').style.display='block'" style="width:auto;">Login button</button>
    
    <div id="formid" class="modal">
      
      <form class="modal-content animate" action="/action.php" method="post">
        <div class="imgcontainer">
          <span onclick="document.getElementById('formid').style.display='none'" class="close" title="Close Modal">&times;</span>
          <img src="img/batman.jpg" alt="Avatar" class="avatar">
        </div>
    
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>
    
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
            
          <button type="submit">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
        </div>
    
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="document.getElementById('formid').style.display='none'" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </form>
    </div>
    
    <script>
    // Get the modal
    var modal = document.getElementById('formid');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
  </body>
</html>
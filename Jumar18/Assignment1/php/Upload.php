<!DOCTYPE html>
<html>
  <head>
    <title>Assignment 1</title>

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
      integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="Stylesheet.css" />
    <link rel="icon" href="img/icon.png" type="png" />
  </head>
  <body>
    <div class="grid-container">
      <div class="itemheader">
        <h1>This is the <b class="headingh1">first assignment</b></h1>
      </div>
      <div class="itemmenu">
        <ul class="sidenav">
          <li><a href="#">Frontpage</a></li>
          <li><a href="#">Image feed</a></li>
          <li><a href="#">Upload page</a></li>
          <li><a href="#">Users</a></li>
          <li>
            <a
              href="#"
              onclick="document.getElementById('formid').style.display='flex'"
              >Login</a
            >
          </li>
        </ul>
      </div>
      <div class="itemmain">
        <div class="container">
          <div>
            <h2>Column</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
              sit amet pretium urna. Vivamus venenatis velit nec neque
              ultricies, eget elementum magna tristique. Quisque vehicula, risus
              eget aliquam placerat, purus leo tincidunt eros, eget luctus quam
              orci in velit. Praesent scelerisque tortor sed accumsan convallis.
            </p>
          </div>
          <div>
            <h2>Column</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
              sit amet pretium urna. Vivamus venenatis velit nec neque
              ultricies, eget elementum magna tristique. Quisque vehicula, risus
              eget aliquam placerat, purus leo tincidunt eros, eget luctus quam
              orci in velit. Praesent scelerisque tortor sed accumsan convallis.
            </p>
          </div>
          <div>
            <h2>Column</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
              sit amet pretium urna. Vivamus venenatis velit nec neque
              ultricies, eget elementum magna tristique. Quisque vehicula, risus
              eget aliquam placerat, purus leo tincidunt eros, eget luctus quam
              orci in velit. Praesent scelerisque tortor sed accumsan convallis.
            </p>
          </div>
          <div>
            <h2>Column</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
              sit amet pretium urna. Vivamus venenatis velit nec neque
              ultricies, eget elementum magna tristique. Quisque vehicula, risus
              eget aliquam placerat, purus leo tincidunt eros, eget luctus quam
              orci in velit. Praesent scelerisque tortor sed accumsan convallis.
            </p>
          </div>
          <div>
            <h2>Column</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
              sit amet pretium urna. Vivamus venenatis velit nec neque
              ultricies, eget elementum magna tristique. Quisque vehicula, risus
              eget aliquam placerat, purus leo tincidunt eros, eget luctus quam
              orci in velit. Praesent scelerisque tortor sed accumsan convallis.
            </p>
          </div>
          <div>
            <h2>Column</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
              sit amet pretium urna. Vivamus venenatis velit nec neque
              ultricies, eget elementum magna tristique. Quisque vehicula, risus
              eget aliquam placerat, purus leo tincidunt eros, eget luctus quam
              orci in velit. Praesent scelerisque tortor sed accumsan convallis.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div id="formid" class="bg-modal">
      <div class="modal">
        <span
          onclick="document.getElementById('formid').style.display='none'"
          class="close"
          title="Close Modal"
          >&times;</span
        >
        <form action="/action.php" method="post">
          <div class="grid-container-login">
            <div class="itemheader">
              <img src="img/icon.png" alt="Avatar" class="avatar" />
            </div>
            <div class="itemmain">
              <div>
                <i class="fas fa-user"></i>
                <label for="username"><b>Username</b></label>
              </div>
              <div>
                <input
                  type="text"
                  placeholder="Enter Username"
                  name="username"
                  required
                />
              </div>
              <div>
                <i class="fas fa-lock"></i>
                <label for="password"><b>Password</b></label>
              </div>
              <div>
                <input
                  type="password"
                  placeholder="Enter Password"
                  name="password"
                  required
                />
              </div>
              <div>
                <span>Not a user? <a href="#">Sign in</a></span>
              </div>
            </div>
            <div class="itemfooter">
              <div>
                <button type="submit" class="btn btnsubmit">Login</button>
              </div>
              <div>
                <button
                  type="button"
                  onclick="document.getElementById('formid').style.display='none'"
                  class="btn btncancel"
                >
                  Cancel
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
  <script>
    // Get the modal
    var modal = document.getElementById('formid');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    };
  </script>
</html>

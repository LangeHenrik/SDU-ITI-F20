<div id="formid" class="bg-modal">
    <div class="modal">
      <span onclick="document.getElementById('formid').style.display='none'" class="close" title="Close Modal">&times;</span>
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
              <input type="text" placeholder="Enter Username" name="username" required />
            </div>
            <div>
              <i class="fas fa-lock"></i>
              <label for="password"><b>Password</b></label>
            </div>
            <div>
              <input type="password" placeholder="Enter Password" name="password" required />
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
              <button type="button" onclick="document.getElementById('formid').style.display='none'" class="btn btncancel">
                Cancel
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
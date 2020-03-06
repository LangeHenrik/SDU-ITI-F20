
<!DOCTYPE html>

<html>

<head>
  <title>Assignment 1</title>
  <link rel="stylesheet" type="text/css" href="Stylesheet/Stylesheet.css" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous" />
  <link rel="icon" href="img/icon.png" type="png" />
</head>

<body>
  <div class="grid-container">
    <div class="itemheader">
      <h1>This is the <b class="headingh1">first assignment</b></h1>
    </div>

    <?php
    require 'Sidemenu.php';
    ?>

    <div class="itemmain">
      <div class="container">
        <div>
          <h2>Assignment</h2>
          <p>
            Assignment is personal or in groups of 2-3 people.</p></br>
          <p>
            Assignment is handed in as BlackBoard Assignment .zip file named with SDU handle, e.g.
            “helan12 assignment 1.zip” The zip file should contain the same content as the assignment
            in your GitHub folder, with accompanying pull request. In case of group assignments,
            everyone hands in the same zip with all SDU handles, e.g. “helan12 jkfa14 assignment
            1.zip”</p></br>
          <p>
            <b>Deadline is march 9th at 23:59.</b>
          </p>
        </div>
        <div>
          <h2>Acceptance criteria</h2>
          <p>Assignment is built only using HTML, CSS, JavaScript, PHP & MySQL.</p>
          <p>Only external library allowed is Font Awesome!</p>
          <p>The site must contain one AJAX call</p>
          <p>Site is responsive</p></br>
          <p>The site will contain the following pages:</p>
          <p>- Frontpage</p>
          <p>- Registration page</p>
          <p>- Upload page</p>
          <p>- Image feed</p>
          <p>- User list</p>
        </div>
        <div>
          <h2>Frontpage</h2>
          <p>Can be reached without logging in.</p></br>
          <p>Contains a login form with the fields “username” and “password”</p></br>
          <p>Contains a link to the registration page.</p>
        </div>
        <div>
          <h2>Registration page</h2>
          <p>Can be reached without logging in</p></br>
          <p>Contains a form for registering a new user</p></br>
          <p>Each field in the form is checked using regex</p>
        </div>
        <div>
          <h2>Upload page</h2>
          <p>Can only be reached when logged in</p></br>
          <p>Uploads an image, with a header and a description</p></br>
        </div>
        <div>
          <h2>Image feed</h2>
          <p>Can only be reached when logged in</p></br>
          <p>Shows all images, headers and descriptions, from any user, along with their username</p></br>
        </div>
      </div>

      <?php
      include 'Login.php';
      ?>
</body>

</html>
    </section>
    <footer>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-bottom">


          <!--
            SDU - Assignement - Internet Technology :: by
            Mads Willum Christiansen : mach018
            Peter Buch Hansen : phans18
            Martin Bremholm Schrøder SDU - mschr18
          -->
        <a class="navbar-brand" href="https://www.sdu.dk/">
          <img src="/Mschr18-Phans18-Mach018/mvc/public/svg/sduLogo.svg" alt="SDU">
        </a>
        <span class="navbar-text custom-tooltip" data-toggle="tooltip" data-placement="top"
          title="Course Internet Technology
                 Lector: Henrik Lange
                 hela@mmmi.sdu.com">
           Course ITI <i class="fas fa-info-circle"></i>
        </span>
        <span class="navbar-text mr-auto">
           &nbsp by:
        </span>
        <span class="navbar-text mr-auto custom-tooltip" data-toggle="tooltip" data-placement="top"
          title="Mads Willum Christiansen
                 mach018@student.sdu.dk">
           <i class="fas fa-fingerprint"></i> mach018 <i class="fas fa-info-circle"></i>
        </span>
        <span class="navbar-text mr-auto custom-tooltip" data-toggle="tooltip" data-placement="top"
          title="Peter Buch Hansen
                 phans18@student.sdu.dk">
           <i class="fas fa-fingerprint"></i> phans18 <i class="fas fa-info-circle"></i>
        </span>
      </nav>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript">
      // activating bootstrap add in.
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
      // activating picupload filname .
      $('#picupload').on('change',function(){
          //get the file name
          var fileName = $(this).val().replace(/^.*\\/, "");
          console.log(fileName);
          //replace the "Choose a file" label
          $(this).next('.custom-file-label').html(fileName);
      });
    </script>

    <?php
      // Loading script for commentsection in feed
      if(substr($_SERVER['REQUEST_URI'], -4) === 'feed') {
        echo "<script src='/Mschr18-Phans18-Mach018/mvc/public/js/comment.js' defer></script>";
      }
      // Displaying login failed alert if loginFailed
      if (isset($_SESSION['loginFailed']) && $_SESSION['loginFailed']) {
        echo "<script>alert('Username or Pasword is wrong');</script>";
      }
      unset($_SESSION['loginFailed']);
      // Loading modeals if logged in
      if( isset($_SESSION['logged_in']) && ($_SESSION['logged_in']) ) {
          include('modalUpload.php');
          include('modalCommentImage.php');
      }
    ?>
  </body>
</html>

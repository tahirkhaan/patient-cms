<?php include "header.php"; ?>

<body>
  <div class="container home">
    <center>
      <h2 style="padding-top: 30px; font-weight: 700;">Patient Information System</h2>
    </center>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <center>
          <div class="buttons">
            <a href="register.php?type=patient" class="btn btn-success btn-lg btn-block btn-huge">Register as a Patient</a>
            <br>
             <a href="register.php?type=doctor" class="btn btn-success btn-lg btn-block btn-huge">Register as a Doctor</a>
            <br>
            
            <br>
            <a href="login.php?type=patient" class="btn btn-success btn-lg btn-block btn-huge">Login as a Patient </a>
            <br>
            <a href="login.php?type=doctor" class="btn btn-success btn-lg btn-block btn-huge">Login as a Doctor</a>
            <br>
          </div>
        </center>
      </div>
    </div>
  </div>

  <?php include "footer.php"; ?>

<?php include "header.php"; ?>

<body>
  <div class="container home">
    <center>
      <h2 style="padding-top: 30px;">Patient Information System</h2>
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
            <a href="login_patient.php" class="btn btn-success btn-lg btn-block btn-huge">Login as a Patient </a>
            <br>
            <a href="login_doctor.php" class="btn btn-success btn-lg btn-block btn-huge">Login as a Doctor</a>
            <br>
          </div>
        </center>
      </div>

    </div>

  </div>

  <?php include "footer.php"; ?>

<?php
session_start();
if (isset($_SESSION['type']) and $_SESSION['type'] === 'doctor') {
    header("location:doctor_logged_in.php");
} elseif (isset($_SESSION['type']) and $_SESSION['type'] === 'patient') {
    header("location:patient_logged_in.php");
}
include "header.php"; ?>

<body>
<div class="container home">

  <div class="row">

    <div class="col-md-12 col-lg-12">

        <?php
        if (isset($_SESSION['errormsg'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['errormsg'] . '</div>';
            unset($_SESSION['errormsg']);
        }
        ?>

      <div class="buttons">
        <a href="register.php?type=patient" class="btn btn-success btn-lg btn-block btn-huge">Register as a Patient</a>
        <br/>
        <a href="login.php?type=patient" class="btn btn-success btn-lg btn-block btn-huge">Login as a Patient </a>
        <br/>
        <a href="login.php?type=doctor" class="btn btn-success btn-lg btn-block btn-huge">Login as a Doctor</a>
        <br/>
      </div>

    </div>
  </div>

</div>

<?php include "footer.php"; ?>

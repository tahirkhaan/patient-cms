<?php
session_start(); 
include "header.php";
 ?>
<body>
<div class="container home">
  <h2 style="padding-top: 30px; text-align:center;font-weight: 700;">Patient Information System</h2>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <div class="err">
          <?php
          if (isset($_SESSION['errormsg'])) {
              echo $_SESSION['errormsg'];
               $_SESSION['errormsg'] = "";
          }
          ?>
      </div>
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
     </div>
  </div>
<?php include "footer.php"; ?>
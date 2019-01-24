<?php
include "header.php";

if (!isset($_GET["type"])) {
    header("Location: ./index.php");
} else {

    $registerType = $_GET['type'];
    if ($registerType === "patient") {
        $submitType = "patient_register";
        $heading = "Register Patient";
    } else if ($registerType === 'doctor') {
        $submitType = "doctor_register";
        $heading = "Register Doctor";
    } else {
        header("location:./");
    }
}

?>
<body>
<div class="box">


  <form method="POST" action="includes/process_register.php" class="LoginDp">
      <?php if ($submitType === 'doctor_register') { ?> Doctor registration disabled, use your existing login. <a href="login.php?type=doctor">Click here</a> to go to login page. <?php } else { ?>
        <h2><?php echo $heading ?></h2>
        <p>
          <label for="name" class="floatLabel">Name</label>
          <input id="name" name="name" required>
        </p>
        <p>
          <label for="username" class="floatLabel">User Name</label>
          <input id="username" name="username" required>
        </p>
        <p>
          <label for="password" class="floatLabel">Password</label>
          <input id="password" name="password" type="password" required>
        </p>
        <p>
          <label for="patient_name" class="floatLabel">Phone Number</label>
          <input id="patientphone" name="phone-number" required>
        </p>
        <p>
          <label for="patient_name" class="floatLabel"> Email</label>
          <input id="patientemail" name="email" type="email" required>
        </p>
        <p>
          <button name="<?php echo $submitType; ?>" id="btnn" class="btn-huge">Register</button>
        </p>  <?php } ?>
  </form>

</div>

<?php include "footer.php"; ?>

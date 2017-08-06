<?php
include "header.php";

if (!isset($_GET["type"])) {
    header("Location: ./index.php");
} else {

    $registerType = $_GET['type'];
    // echo $registerType;
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
  <form method="POST" action="includes/process_register.php"  class="LoginDp">
    <h2><?php echo $heading ?></h2>
    <p>
      <label for="username" class="floatLabel"> Name</label>
      <input id="number" name="username" required>
    </p>
    <p>
      <label for="password" class="floatLabel">Password</label>
      <input id="password" name="password" type="password" required>
    </p>
    <p>
      <label for="patient_name" class="floatLabel">Phone Number</label>
      <input id="patientphone" name="phone-number" type="number" required>
    </p>
    <p>
      <label for="patient_name" class="floatLabel"> Email</label>
      <input id="patientemail" name="email" type="email" required>
    </p>
    <p>
      <button name="<?php echo $submitType; ?>" id="btnn" class="btn">Register</button>
    </p>
  </form>
</div>

<?php include "footer.php"; ?>

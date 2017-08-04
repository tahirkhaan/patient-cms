<?php include "header.php"; ?>
<body>
  <div class="box">
    <form method="POST" action="login/login_patient.php">
      <h2>Patient Login</h2>
      <p>
        <label for="patientname" class="floatLabel">Patient Name</label>
        <input id="patientname" name="patientname" type="text">
      </p>
      <p>
        <label for="password" class="floatLabel">Password</label>
        <input id="password" name="password" type="password">
        <span>Enter a password longer than 8 characters</span>
      </p>
      <p>
        <button type="submit" id="btnn" class="btn">Login</button>
      </p>
    </form>
  </div>
  <?php include "footer.php"; ?>
<?php include "header.php"; ?>

<body>

  <form action="#" method="post">
    <h2>Patient Register</h2>
    <p>
      <label for="Email" class="floatLabel">Patient Id</label>
      <input id="number" name="id" type="text">
    </p>
    <p>
      <label for="password" class="floatLabel">Password</label>
      <input id="password" name="password" type="password">
      <span>Enter a password longer than 8 characters</span>
    </p>
    <p>
      <label for="patient_name" class="floatLabel">Patient Name</label>
      <input id="patient_name" name="patient_name" type="text">

    </p>
    <p>
      <label for="patient_name" class="floatLabel">Patient Mobile</label>
      <input id="patient_name" name="patient_name" type="text">

    </p>
    <p>
      <input type="submit" value="Register" id="submit">
    </p>
  </form>

  <?php include "footer.php"; ?>

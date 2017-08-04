 <?php
  include "header.php";
 ?>


<body style="font-size: 10px;">

  <form  method="post" action="register_user/register.php">
    <h2>Doctor Register</h2>
    <p>
      <label for="username" class="floatLabel">Patient Name</label>
      <input id="number" name="username" type="text" required>
    </p>
    <p>
      <label for="password" class="floatLabel">Password</label>
      <input id="password" name="password" type="password" required>
      <!--<span>Enter a password longer than 8 characters</span>-->
    </p>
    <p>
      <label for="patientphone" class="floatLabel">Phone Number</label>
      <input id="patientphone" name="phonenumber" type="number" required>

    </p>
    <p>
      <label for="doctoremail" class="floatLabel">Patient Email</label>
      <input id="doctoremail" name="doctoremail" type="email" required>

    </p>
    <p>
     
     <button type="submit" name="doctor_submit" id="btnn" class="btn">Login</button>
    </p>
  </form>

  <?php include "footer.php"; ?>

<?php include "header.php"; 
include_once('login/session_login.php');
?>
<body>
  <div class="box">
    <form action="login/login_doctor.php" method="post" class="LoginDp">
      <h2>Doctor Login</h2>
      <p>
        <label for="doctorEmail" class="floatLabel">Doctor Email</label>
        <input id="doctorname" name="doctorEmail" type="text">
      </p>
      <p>
        <label for="password" class="floatLabel">Password</label>
        <input id="password" name="password" type="password">
       <!--  <span>Enter a password longer than 8 characters</span> -->
      </p>
      <p>
        <button type="submit" id="btnn" class="btn">Login</button>
      </p>
    </form>
  </div>
 <?php include "footer.php"; ?>
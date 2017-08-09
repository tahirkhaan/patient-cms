<?php
  include ("config/conn.php");
include "header.php";

if (!isset($_GET["type"])) {
    header("Location: ./index.php");
} else {

    $LoginType = $_GET['type'];
    // echo $registerType;
    if ($LoginType === "patient") {
        $submitType = "patient_login";
        $heading = "Login Patient";
         $label = "Patient Email";
    } else if ($LoginType === 'doctor') {
        $submitType = "doctor_login";
        $heading = "Login Doctor";
        $label = "Doctor Email";
    } else {
        header("location:./");
    }
}

?>
<body>
  <div class="box">
    <form action="includes/process_login.php" method="post" class="LoginDp">
      <h2><?php echo $heading ?></h2>
      <p class = "error"> <?php
          if (isset($_SESSION['errormsg'])) {
              echo $_SESSION['errormsg'];
               $_SESSION['errormsg'] = "";
          }
          ?></p>
<p>
        <label for="Email" class="floatLabel"><?php echo $label ?></label>
        <input  name="email" type="text">
      </p>
      <p>
        <label for="password" class="floatLabel">Password</label>
        <input name="password" type="password">
       <!--  <span>Enter a password longer than 8 characters</span> -->
      </p>
      <p>
        <button name="<?php echo $submitType; ?>" id="btnn" class="btn">Login</button>
      </p>
    </form>
  </div>
 <?php include "footer.php"; ?>

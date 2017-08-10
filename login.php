<?php
session_start();
include("config/conn.php");

if (!isset($_GET["type"])) {
    $LoginType = "patient";
    $heading = "Patient Login";
    $label = "Patient Email";
    $submitType = "patient_login";
} else {

    $LoginType = $_GET['type'];
    if ($LoginType === "patient") {
        $submitType = "patient_login";
        $heading = "Patient Login";
        $label = "Email";
    } else if ($LoginType === 'doctor') {
        $submitType = "doctor_login";
        $heading = "Doctor Login";
        $label = "Email";
    } else {
        header("location:./");
    }
}
include "header.php";
?>
<body>
<div class="box">
  <form action="includes/process_login.php" method="post" class="LoginDp">
    <h2><?php echo $heading ?></h2>
    <p class="error"> <?php
        if (isset($_SESSION['errormsg'])) {
            echo $_SESSION['errormsg'];
            $_SESSION['errormsg'] = "";
        }
        ?></p>
    <p>
      <label for="Email" class="floatLabel"><?php echo $label ?></label>
      <input name="email" type="text">
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

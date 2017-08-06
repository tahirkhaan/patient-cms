<?php
 session_start();
 include ("../config/conn.php");

if (isset($_POST["patient_login"]) || isset($_POST["doctor_login"])) {

    // username and password sent from form
    $myUserEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $myPassword = mysqli_real_escape_string($conn, $_POST['password']);

      if (isset($_POST["patient_login"]) ) {
       $type = 'patient';
    } else {
        $type = 'doctor';
    }
     $sql = "SELECT * FROM `users` WHERE email = '$myUserEmail' and password = '$myPassword' and type = '$type'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1)
    {
        $_SESSION['email'] = $myUserEmail;
        header("location: ../patient_logged_in.php");
    }
    else
    {
        echo "invalid user name or password ";
      }
}

?>

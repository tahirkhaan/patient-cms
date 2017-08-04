<?php
session_start();
include ("../config/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // username and password sent from form
    $myUserName = mysqli_real_escape_string($conn, $_POST['patientname']);
    $myPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $type = "patient";
    $sql = "SELECT * FROM `users` WHERE usersname = '$myUserName' and password = '$myPassword' and type = '$type'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1)
    {
        $_SESSION['username'] = $myusername;
        header("location: ../patient_logged_in.php");
    }
    else
    {
        echo "invalid user name or password ";
    }
}



?>
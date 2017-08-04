<?php
session_start();
include ("../config/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // username and password sent from form
    $myUserName = mysqli_real_escape_string($conn, $_POST['doctorname']);
    $myPassword = mysqli_real_escape_string($conn, $_POST['password']);
    $type = "doctor";
    $sql = "SELECT * FROM `users` WHERE usersname = '$myUserName' and password = '$myPassword' and type = '$type'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1)
    {
        $_SESSION['usersname'] = $myusername;
        header("location: ../doctor_logged_in.php");
    }
    else
    {
        echo "invalid user name or password ";
        // function error(){
        //  $_SESSION['error'] = "invalid user name";
        //  $error = $_SESSION['error'] ;
        //  // print_r($_SESSION);
        //  return $error;
        // } 
    }
}

?>

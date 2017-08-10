<?php
session_start();
include("../config/conn.php");

if (isset($_POST["patient_login"]) || isset($_POST["doctor_login"])) {

    $myUserEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $myPassword = mysqli_real_escape_string($conn, $_POST['password']);

    if (isset($_POST["patient_login"])) {
        $type = 'patient';
    } else {
        $type = 'doctor';
    }


    $sql = "SELECT * FROM `users` WHERE email = '$myUserEmail' and password = '$myPassword' and type = '$type'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $type = $row['type'];

    if ($type == "patient") {
        $_SESSION['email'] = $myUserEmail;
        header("location: ../patient_logged_in.php");
    } elseif ($type == "doctor") {
        $_SESSION['email'] = $myUserEmail;
        header("location: ../doctor_logged_in.php");
    } else {
        if (isset($_POST["patient_login"])) {
            $_SESSION['errormsg'] = "Invalid username or password. Please make sure you are registered as a patient and using the same login.";
            header("location: ../login.php?type=patient");
        }
        if (isset($_POST["doctor_login"])) {
            $_SESSION['errormsg'] = "Invalid username or password. Please make sure your logging in as a doctor.";
            header("location: ../login.php?type=doctor");
        }
    }
}


<?php

include("config/conn.php");

if (isset($_POST["patient_register"]) || isset($_POST["doctor_register"])) {
    $username = $_POST['username'];
    $userPass = $_POST['password'];
    $phoneNumber = $_POST['phone-number'];
    $doctorEmail = $_POST['email'];
    if ($_POST["doctor_register"]) {
        $type = 'doctor';
        if(!checkforUnique($doctorEmail)){
           $sql = "insert into users (usersname, password, phone, email,type)  values ($username,$userPass,$phoneNumber,$doctorEmail,$type)";
        }
    }
    if ($_POST["patient_register"]) {
        $type = 'patient';
        $sql = "insert into users (usersname, password, phone, email,type)  values ($username,$userPass,$phoneNumber,$doctorEmail,$type)";
    }
    if (mysqli_query($conn, $sql)) {
        $SESSION['msg'] = "Successfully registered";
        header("location:register.php");
    } else {
        $SESSION['msg'] = "There was a problem while registering, please try again";
        header("location:register.php");
    }
}


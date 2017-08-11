<?php
session_start();
include "../config/conn.php";
if (isset($_POST["patient_register"]) || isset($_POST["doctor_register"])) {
    $name = $_POST['name'];
    $userName = $_POST['username'];
    $userPass = $_POST['password'];
    $phoneNumber = $_POST['phone-number'];
    $email = $_POST['email'];
    $sql = "";

    if (isset($_POST["patient_register"])) {
        $type = 'patient';
    } else {
        $type = 'doctor';
    }

    if (isUnique($email)) {
        include "../config/conn.php";
        $sql = "insert into users (name, username, password, phone, email, type)  values 
        ('$name','$userName','$userPass','$phoneNumber','$email','$type')";
        if (mysqli_query($conn, $sql)) {
            header("location: ../login.php");
        }
        else {
            $_SESSION["errormsg"] = "There was a problem registering, please try again";
            header("location: ../index.php");
        }
    } else {
        $_SESSION["errormsg"] = "Email already exist";
        header("location: ../index.php");
    }
}
function isUnique($email)
{
    include "../config/conn.php";
    $sql = "SELECT * FROM users where email LIKE '$email'";
    // Code for counting actual rows
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        return false;
    }
    return true;
}

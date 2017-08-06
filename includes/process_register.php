<?php
include("../config/conn.php");

if (isset($_POST["patient_register"]) || isset($_POST["doctor_register"])) {
    $username = $_POST['username'];
    $userPass = $_POST['password'];
    $phoneNumber = $_POST['phone-number'];
    $email = $_POST['email'];
    $sql = "";


    if (isset($_POST["patient_register"]) ) {
       $type = 'patient';
    } else {
        $type = 'doctor';
    }

    if(isUnique($email)){  
    $sql = "insert into users (usersname, password, phone, email, type)  values ('$username','$userPass','$phoneNumber','$email','$type')";
    } 

    if($sql !== "") {
        if (mysqli_query($conn, $sql)) {
            echo"Successfully registered";
              header("location: ../login.php");
         } else {
            echo "There was a problem while registering, please try again";
             header("location:../login.php");
        }    
    }
}
function isUnique($email){

    $sql = "COUNT * FROM users where email LIKE '$email'";
    
    // Code for counting actual rows
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

        if($count>0) {
            return false; 
            echo "Email already exist";   
        } 
        
    return true;
}

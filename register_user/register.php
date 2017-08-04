<?php

include("../config/conn.php");

// INSERT INTO `users`(`id`, `type`, `usersname`, `password`, `phone`, `email`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
if(isset($_POST["patient_submit"]))
{
$username = $_POST['username'];
$userpass = $_POST['password'];
$phonenumber = $_POST['phonenumber'];
$patientemail = $_POST['patientemail'];
$type= 'patient';

$sql = "insert into users (usersname, password, phone, email,type) 

 values ('$username','$userpass','$phonenumber','$patientemail','$type')";

 if (mysqli_query($conn, $sql)) {
        // header("location:signup.php");
    echo "your successfully Register";
    echo "<br><a href='../signup.php'>Go Back to Home Page</a>";
} else {
    echo  mysqli_error($conn);
}

mysqli_close($conn);

}

/*Regisration for doctor*/

if(isset($_POST["doctor_submit"]))
{
$username = $_POST['username'];
$userpass = $_POST['password'];
$phonenumber = $_POST['phonenumber'];
$doctoremail = $_POST['doctoremail'];
$type= 'Doctor';

$sql = "insert into users (usersname, password, phone, email,type) 

 values ('$username','$userpass','$phonenumber','$doctoremail','$type')";

 if (mysqli_query($conn, $sql)) {
        // header("location:signup.php");
    echo "your successfully Register";
    echo "<br><a href='../signup.php'>Go Back to Home Page</a>";
} else {
    //echo mysqli_error($conn);
    echo 'Email already registerd please use Difirent emai';
}

mysqli_close($conn);

}

?>
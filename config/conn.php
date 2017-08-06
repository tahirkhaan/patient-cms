<?php
$serverName = "localhost";

$username = "root";
$password = "";
$db = "patient_cms";
$port = "3306";

$conn = mysqli_connect($serverName, $username, $password, $db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/*
$username = "Fahad";
$userPass = "asas";
$phoneNumber = "998877";
$doctorEmail = "info@gasgagsgas.com";
$type = "asasas";

$sql = "insert into users (usersname, password, phone, email, type)  values ('$username','$userPass','$phoneNumber','$doctorEmail','$type')";

echo $sql;

if (mysqli_query($conn, $sql)) {
        echo"Successfully registered";
      //  header("location:./login.php");
    } else {
        echo "There was a problem while registering, please try again";
      //  header("location:./login.php");
    }

*/
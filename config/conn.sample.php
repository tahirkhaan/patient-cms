<?php
$serverName = "localhost"; // Some places might only accept ip as in 127.0.0.1

$username = "root";
$password = "";
$db = "patient_cms";
$port = "3306";

$conn = mysqli_connect($serverName, $username, $password, $db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

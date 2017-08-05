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

<?php
$serverName = "localhost";

$username = "root";
$password = "pass4rd";
$db = "patient_cms";
$port = "8889";

$conn = mysqli_connect($serverName, $username, $password, $db, $port);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

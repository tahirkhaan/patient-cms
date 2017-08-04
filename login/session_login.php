<?php
session_start();
include ("config/conn.php");

if (isset($_SESSION['username']))
{
	$user_check = $_SESSION['username'];
	$userType = $_SESSION['type'];
	$ses_sql = mysqli_query($conn, "select * from users where usersname = '$user_check'");
	$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
	$login_session = $row['usersname'];
	$type = $row['type'];
	$_SESSION['type'] = $type;
}
else
{
	header("location:login_patient.php");
}


?>
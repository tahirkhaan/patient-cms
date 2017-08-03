<?php
session_start();
include ("config/conn.php");

if (isset($_SESSION['username']))
{
	$user_check = $_SESSION['username'];
	$ses_sql = mysqli_query($conn, "select * from users where username = '$user_check' ");
	$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
	$login_session = $row['username'];
}
else
{
	header("location:login_patient.php");
}

?>
<?php
session_start();
include ("./config/conn.php");

if (isset($_SESSION['email']))
{
	$user_check = $_SESSION['email'];
	$ses_sql = mysqli_query($conn, "select * from users where email = '$user_check'");
	$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
	$login_session = $row['email'];
	$name = $row['usersname'];
	$type = $row['type'];
	$idSession = $row['id'];
	// $_SESSION['type'] = $type;
}
else
{
	header("location:index.php");
}

?>
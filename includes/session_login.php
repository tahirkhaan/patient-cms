<?php
session_start();
if (isset($_SESSION['email'])) {
    $user_check = $_SESSION['email'];
    $ses_sql = mysqli_query($conn, "select * from users where email = '$user_check'");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $login_session = $row['email'];
    $name = $row['name'];
    $phone = $row['phone'];
    $type = $row['type'];
    $idSession = $row['id'];
} else {
    header("location:index.php");
}

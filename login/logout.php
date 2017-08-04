<?php  
unset($_SESSION['usersname']); // will delete just the name data
session_destroy();
?>
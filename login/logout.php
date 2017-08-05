<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: ../login_doctor.php");
   }
?>
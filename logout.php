<?php
   session_start();
   
   if(session_destroy()) {
 echo "<script>";
echo "window.location='login.php'";
echo "</script>";
   }
?>
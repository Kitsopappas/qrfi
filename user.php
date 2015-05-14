<?php
   if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(!isset($_SESSION["sess_user"])){
  header("Location:login.php");

} else {
  $username = $_SESSION["sess_user"];
}
?>

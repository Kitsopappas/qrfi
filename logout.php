<?php
session_start();
unset($SESSION['sess_user']);
session_destroy();
header("Location:login.php");
?>

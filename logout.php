<?php
session_start();
 
$_SESSION = array();
 
session_destroy();
 
header("location: logout_msg.php");
exit;
?>
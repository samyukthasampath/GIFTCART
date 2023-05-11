<?php
session_start();
 
$_SESSION = array();
 
session_destroy();
 
header("location: admin_logout_msg.php");
exit;
?>
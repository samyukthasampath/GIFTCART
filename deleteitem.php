<?php

session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("location: logout_msg.php");
  }
include "dbConn.php";
$cart_id = $_GET['cart_id'];

mysqli_query($db,"delete from cart_details where cart_id=$cart_id"); 

 header("Location: cart_details.php");

?>

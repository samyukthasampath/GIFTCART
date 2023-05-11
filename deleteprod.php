<?php

session_start();

if (!isset($_SESSION['aloggedin']) && $_SESSION['aloggedin'] == false) {
    header("location: admin_logout_msg.php");
  }
include "dbConn.php";
$prod_id = $_GET['prod_id'];

mysqli_query($db,"delete from products where prod_id=$prod_id"); 

header("Location: admin_product.php");

?>
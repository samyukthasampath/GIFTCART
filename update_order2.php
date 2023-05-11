<?php

if(isset($_POST['Submit']))
{
  
    session_start();
    if (!isset($_SESSION['aloggedin']) && $_SESSION['aloggedin'] == false) {
        header("location: logout_msg.php");
    
    }


        session_start();
        $order_id=$_SESSION['order_id'];
        include "dbConn.php";
        $selected = $_POST['status'];
        mysqli_query($db,"Update orders set status='$selected' where order_id=$order_id");
        header("location: admin_o_details.php");
        mysqli_close($db); 

}
?>
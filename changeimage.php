
<?php
session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
    header("location: logout_msg.php");
  }
$cart_id=$_SESSION['cart_id'];
echo $cart_id;
@$name = $_FILES['file']['name'];
@$size = $_FILES['file']['size'];
@$type = $_FILES['file']['type'];
@$tmp_name = $_FILES['file']['tmp_name'];
if (isset($name)) {
    if (!empty($name)) 
    {
    $location = 'uploaded/';
    if (move_uploaded_file($tmp_name, $location. $name));
    $filename= $location . $name;
    include "dbConn.php";
    
    $prod_id=$_SESSION['prod_id'];
    $cust_id=$_SESSION['cust_id'];
    echo $filename;
    mysqli_query($db,"update cart_details set image='$filename' where cart_id=$cart_id");
    header("Location: cart_details.php");

}
    else 
    {
        echo 'Please choose a file';
    }
    
}
?> 

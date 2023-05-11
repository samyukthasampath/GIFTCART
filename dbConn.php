<?php
$db = mysqli_connect("localhost","root","","giftcart");
if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
    echo "connection_aborted";
}
?>

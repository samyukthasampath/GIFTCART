<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
  <title>GIFTCART</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body class="cont">
  <div class="container-fluid">
    <div class="row top">
      <div class="col-md-4">
        <a href="product.php">
          <img src="images/giftcart_short.jpeg" class="img m-3" height="18%">
        </a>
      </div>
      <div class="col-md-4 ref pt-4 text-center">
        <h3><strong>Order Details</strong></h3>
      </div>
      <div class="col-md-4">
        <nav class="nav justify-content-end nav-pills nav-justified">
        <div>
                    <a href="aboutus.php">
                    <img class="mt-3" src="images/i.png" height="60" width="60">
                    </a>
                </div>
          <div>
            <input type="button" name="back" class="nav-item m-3 p-3" value="Back" onclick="document.location.href='admin_orders.php'">
          </div>
          <div>
            <input type="button" name="Update order" class="nav-item m-3 p-3" value="Update Order" onclick="document.location.href='Update_order.php'">
          </div>
          <div>
            <input type="button" name="logout" class="nav-item m-3 p-3" value="Logout" onclick="document.location.href='admin_logout.php'">
          </div>
        </nav>
      </div>
    </div>
    <?php
      session_start();
      if (!isset($_SESSION['aloggedin']) && $_SESSION['aloggedin'] == false) {
          header("location: logout_msg.php");
        }
        if(isset($_GET['id'])) {
          $order_id=$_GET['id'];
        }
        else {
          $order_id=$_SESSION['order_id'];
        }
      include "dbConn.php"; // Using database connection file here
      $sql = "SELECT * FROM `orders` WHERE order_id=$order_id";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
      $_SESSION['order_id']=$order_id;
      $records = mysqli_query($db,"select * from orders as o INNER JOIN customer as c on c.cust_id=o.cust_id where o.order_id=$order_id"); 
      $data = mysqli_fetch_array($records);
    ?>
    <div class="section mt-4">
      <h5><strong>Order Details</strong></h5>
    </div>
    <div class="row p-5">
      <table class="table table-danger table-bordered">
        <tr>
          <th>Order ID</th>
          <td><?php echo $data['order_id'];?></td>
        </tr>
        <tr>
          <th>Customer ID</th>
          <td><?php echo $data['cust_id'];?></td>
        </tr>
        <tr>
          <th>Customer name</th>
          <td><?php echo $data['cust_name'];?></td>
        </tr>
        <tr>
          <th>Address</th>
          <td><?php echo $data['address'];?></td>
        </tr>
        <tr>
          <th>Phone number</th>
          <td><?php echo $data['phno'];?></td>
        </tr>
        <tr>
          <th>Date</th>
          <td><?php echo $data['date'];?></td>
        </tr>
        <tr>
          <th>Total Amount</th>
          <td><?php echo $data['total']; ?></td>
        </tr>
        <tr>
          <th>Status</th>
          <td><?php echo $data['status']; ?></td>
        </tr>
      </table>
    </div>
    <?php
      $sql = "SELECT * FROM order_details WHERE order_id=$order_id";
      $result = mysqli_query($db,$sql);
      while($data = mysqli_fetch_assoc($result))
      {
        $prod_id=$data['prod_id'];
        $s = "SELECT * FROM `products` WHERE prod_id=$prod_id";
        $records = mysqli_query($db,$s);  
        $d = mysqli_fetch_assoc($records);
    ?>
    <div class="row p-5 pt-0">
      <table class="table table-sm table-danger table-bordered">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Cost</th>
            <th>Product Photo</th>
            <th>The Customized Image</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="w-25"><?php echo $d['prod_name'];?></td>
            <td><?php echo $d['cost'];?></td>
            <td>
              <img src="<?php echo $d['pic1']; ?>" alt="Image" width="100" height="100">
            </td>
            <td>
              <img src="<?php echo $data['image']; ?>" alt="Image" width="100" height="100">
            </td>
          </tr>
        </tbody>
    </table>
  </div>
  <?php
    }
  ?>
  <?php mysqli_close($db);  // close connection ?>
</body>
</html>
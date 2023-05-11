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
        <h3><strong>All Orders</strong></h3>
      </div>
      <div class="col-md-4">
        <nav class="nav justify-content-end nav-pills nav-justified">
        <div>
                    <a href="aboutus.php">
                    <img class="mt-3" src="images/i.png" height="60" width="60">
                    </a>
                </div>
          <div>
            <input type="button" name="back" class="nav-item m-3 p-3" value="Back" onclick="document.location.href='adminpage.php'">
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
        header("Location:admin_logout_msg.php");
      }
    ?>
    <div class="section p-5">
      <h3><strong>Click on the order to view and update Orders</strong></h3>
    </div>
    <?php
      include "dbConn.php";
      $records = mysqli_query($db,"select * from orders ");
      $count=mysqli_num_rows($records);
      if($count==0)
      {
        header("Location: adminpage.php");
      }
      while($data = mysqli_fetch_array($records))
      {
    ?>
    <div class="row p-5 pt-2">
      <a class="t" href="admin_o_details.php?<?php echo 'id='.$data['order_id']; ?>">
        <table class="table table-danger table-bordered">
          <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Total Amount</th>
            <th>Status</th>
          </tr>
          <tr>
            <td><?php echo $data['order_id'];?></td>
            <td><?php echo $data['date']; ?></td>
            <td><?php echo $data['total']; ?></td>
            <td class="w-25"><?php echo $data['status']; ?></td>
          </tr>
        </table>
      </a>
    </div>
  </div>
  <?php
    }
  ?>
  <?php mysqli_close($db);?>
</body>
</html>
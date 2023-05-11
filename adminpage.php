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
        <h3><strong>Welcome ADMIN!!</strong></h3>
      </div>
      <div class="col-md-4">
        <nav class="nav justify-content-end nav-pills nav-justified">
        <div>
                    <a href="aboutus.php">
                    <img class="mt-3" src="images/i.png" height="60" width="60">
                    </a>
                </div>
          <div>
          <input type="button" name="logout" value="Logout" class="nav-item m-3 p-3" onclick="document.location.href='logout.php'">
          </div>
        </nav>
      </div>
    </div>
    <div class="button button5 products mt-5" >
      <input type="button" name="Products" value="Products" class="nav-item m-3 p-3" onclick="document.location.href='admin_product.php'">
      <input type="button" name="Orders" value="Orders" class="nav-item m-3 p-3" onclick="document.location.href='admin_orders.php'">
      
    </div>
    <div class="row p-5">
      <table class="table text-center table-danger table-bordered">
        <tr>
          <th>CustomerID</th>
          <th>Customer Name</th>
          <th>Address</th>
          <th>Phone Number</th>
        </tr>
        <?php
        include "dbConn.php";
        mysqli_query($db,"CREATE OR REPLACE VIEW cust_details as select cust_id, cust_name, address, phno from `customer`");
         $row = mysqli_query($db,"select * from `cust_details`");
          session_start();
          if (!isset($_SESSION['aloggedin']) && $_SESSION['aloggedin'] == false) {
          header("Location:admin_logout_msg.php");
          }
          while($res = mysqli_fetch_array($row))
          {
          ?>
         <tr>
          <td><?php echo $res['cust_id']; ?></td>
          <td><?php echo $res['cust_name']; ?></td>
          <td><?php echo $res['address']; ?></td>
          <td><?php echo $res['phno']; ?></td> 
          </tr>
          <?php
          }
        ?>
      </table>
    </div>
  </div>     
</body>
</html>
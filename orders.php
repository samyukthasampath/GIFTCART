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
        <h3><strong>Your Orders</strong></h3>
      </div>
      <div class="col-md-4">
        <nav class="nav justify-content-end nav-pills nav-justified">
        <div>
                    <a href="aboutus.php">
                    <img class="mt-3" src="images/i.png" height="60" width="60">
                    </a>
                </div>
          <div>
            <input type="button" name="myorders" class="nav-item m-3 p-3" value="My Orders" onclick="document.location.href='orders.php'">
          </div>
          <div>
            <input type="button" name="cart" value="My Cart" class="nav-item m-3 p-3" onclick="document.location.href='cart_details.php'">
          </div>
          <div>
          <input type="button" name="logout" value="Logout" class="nav-item m-3 p-3" onclick="document.location.href='logout.php'">
          </div>
        </nav>
      </div>
    </div>
      <?php
        session_start();
        $username = $_SESSION['username'];
        if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
          header("location: logout_msg.php");
        }
      ?>
      <div class="section mt-4">
        <h5><strong>Click on an order to view its order details</strong></h5>
      </div>
      <form method="get">
        <?php
          include "dbConn.php";
          $sql = "SELECT * FROM `customer` WHERE username='$username'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_assoc($result);
          $custid = $row["cust_id"];
          $records = mysqli_query($db,"select order_id,date,total,status from orders where cust_id=$custid");
          $count=mysqli_num_rows($records);
          if($count==0)
          {
            header("Location:emptyorders.php");
          }
          while($data = mysqli_fetch_array($records))
          {
        ?>
        <div class="row p-5">
          <a class="t" href="orderdetails.php?<?php echo 'id='.$data['order_id']; ?>">
            <table class="table table-danger table-bordered">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Date</th>
                  <th>Total Amount</th>
                  <th>Status</th>
                </tr>
              </thead>
                <tbody>
                  <tr>
                    <td><?php echo $data['order_id'];?></td>
                    <td><?php echo $data['date'];?></td>
                    <td><?php echo $data['total'];?></td>
                    <td class="w-25"><?php echo $data['status'];?></td>
                  </tr>
                </tbody>
            </table>
          </a>
        </div>
        <?php
          }
        ?>
      </form>
      <?php mysqli_close($db);?>
  </div>
  <footer> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
  </footer>
</body>
</html>
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
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      }
      else {
        echo "Please log in first to see this page.";  
        header("location: logout_msg.php");
      }
      if(isset($_GET['back'])) {
        header('Location:orders.php');
      }
      if(isset($_GET['id'])) {
        $order_id=$_GET['id'];
      }
      else {
        $order_id=$_SESSION['order_id'];
      }
    ?>
    <div class="section mt-4">
      <h5><strong>Order Details</strong></h5>
    </div>
    <?php
      include "dbConn.php"; // Using database connection file here
      $sql = "SELECT * FROM `orders` WHERE order_id=$order_id";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
      $order_id = $row["order_id"];
      $_SESSION['order_id']=$order_id;
    ?>
    <div class="row p-5">
      <table class="table table-danger table-bordered">
        <?php
          $records = mysqli_query($db,"SELECT order_id, date, total, status from orders where order_id=$order_id");
          $data = mysqli_fetch_array($records);
        ?>
        <tr>
          <th>Order ID</th>
          <td><?php echo $data['order_id'];?></td>
        </tr>
        <tr>
          <th>Date</th>
          <td><?php echo $data['date'];?></td>
        </tr>
        <tr>
          <th>Total Amount</th>
          <td><?php echo $data['total'];?></td>
        </tr>
        <tr>
          <th>Status</th>
          <td><?php echo $data['status'];?></td>
        </tr>
      </table>
    </div>
    <?php
      $sql = "SELECT * FROM `order_details` WHERE order_id=$order_id";
      $result = mysqli_query($db,$sql);
      while($da = mysqli_fetch_assoc($result))
      {
        $prod_id=$da['prod_id'];
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
            <th>Your Customized image</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="w-25"><?php echo $d['prod_name'];?></td>
            <td><?php echo $d['cost'];?></td>
            <td><a href="product_details.php?prod_id=<?php echo $d['prod_id']?>">
              <img src="<?php echo $d['pic1']; ?>" alt="Image" width="100" height="100">
            </a></td>
            <td>
              <img src="<?php echo $da['image']; ?>" alt="Image" width="100" height="100">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <?php
      }
    ?>
  </div> 
  <div class="section">
    <form action="orderdetails.php" method="get">
      <input type="submit" name="cancel" class="nav-item m-3 p-3" value="Cancel this order"><br>
      <div class="text-danger">
        **Orders can be cancelled only when its STATUS is PLACED.**
      </div>
    </form>
  </div>
  <div class="text-danger">
    <?php
      if(isset($_GET['cancel'])) {
        if($data['status']=='PLACED') {
          $sq1 = "DELETE FROM `order_details` WHERE order_id=$order_id";
          $re = mysqli_query($db,$sq1);
          $sq2 = "DELETE FROM `orders` WHERE order_id=$order_id";
          $re = mysqli_query($db,$sq2);
          header("Location: orders.php");
        }
        else {
          echo "**Cannot be cancelled as this order was already ".$data['status']."**";
        }
      }
    ?>
  </div>
  <?php mysqli_close($db);  // close connection ?>
  <footer> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
  </footer>
</body>
</html>
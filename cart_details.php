<!DOCTYPE html>
<html>
<head>
  <title>GIFTCART</title>
  <link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">   
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
        <h3><strong>Your Cart</strong></h3>
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
      header("location: logout_msg.php");
      } 
      include "dbConn.php";
      $cust_id=$_SESSION['cust_id'];
      $result = mysqli_query($db,"select c.cart_id,p.prod_id,p.prod_name,p.cost,c.image from `cart_details` as c INNER JOIN `products` as p on p.prod_id=c.prod_id where c.cust_id=$cust_id"); 
      $count=mysqli_num_rows($result);
      if ($count==0)
      {
        header("Location: emptycart.php");
      }
    ?>
    <div class="section mt-4">
      <h2><strong>Products in cart</strong></h2>
    </div>
    <?php
      $cost=0;
      while($row = mysqli_fetch_array($result))
      {
        $cost=$cost + $row['cost'];
    ?>
    <div class="row p-5">
      <table class="table text-center table-danger table-bordered">
        <tr>
          <th>Product Name</th>
          <th>Cost</th>
          <th>Image Uploaded</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <td class="w-25"><?php echo $row['prod_name']; ?></td>
          <td><?php echo $row['cost']; ?></td>
          <td><img src="<?php echo $row['image']; ?>" width="100" height="100"></td> 
          <td class="text-center pt-5">
            <h5><strong><a class="t" href='changeimage1.php?cart_id=<?php echo $row['cart_id']?>'>Change Image</a></strong></h5>
          </td>  
          <td class="text-center pt-5">
            <a href='deleteitem.php?cart_id=<?php echo $row['cart_id']?>'>
              <img src="images/delete.png" width="20" height="20">
            </a>
          </td>
        </tr>
      </table>
    </div>
    <?php
      } 
    ?>
    <div class="section mx-5 px-5">
      <strong>
        <?php
          echo "<h3><strong>Total Cost = " .$cost."</strong></h3>";
          $_SESSION['cost']=$cost;
        ?>
      </strong>
      <input type="button" class="nav-item p-3 m-3" name="place order" style="float:right;" value="Place Order" onclick="document.location.href='placeorder.php'">
    </div>
  </div>
  <footer> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
  </footer>
</body>
</html>
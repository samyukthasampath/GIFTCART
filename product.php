<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
    <title>Gift Cart</title>
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
          <h3>
            <?php
              session_start();
              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                  echo "<strong>Hello " . $_SESSION['cust_name'] . "!</strong>";
              }
              else {
                header("location: logout_msg.php");
              }
            ?>
          </h3>    
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
      <div class="row head mx-0 px-5">
        <div class="heading">
          <h2><strong>Products</strong></h2>
        </div>
      </div>
      <div class="row products">
        <form method="get">
          <?php
            include "dbConn.php"; // Using database connection file here
            $records = mysqli_query($db,"select prod_id,prod_name,cost,pic1 from products"); // fetch data from database
            while($data = mysqli_fetch_array($records))
            {
          ?>
          <a class="t" href="product_details.php?prod_id=<?php echo $data['prod_id']?>">
            <div class="prod col-md-3 text-center mx-5 m-2">
              <img src="<?php echo $data['pic1']; ?>" class="m-1" height="300rem">   
              <div class="content">
                <?php echo $data['prod_name']; ?>
              </div>
              <div class="content">
                <?php echo 'Cost: &#8377;'.$data['cost']; ?>
              </div>
            </div>
          </a>
          <?php
            }
          ?>
        </form>  
      </div>
    </div>
    <?php mysqli_close($db);  // close connection ?>
    <footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    </footer>
  </body>
</html>
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
<body class="log">
 <div class="container-fluid text-center pt-5 px-5">
    <div class="row px-5">
      <div class="col-sm-12 col-md-6 pt-5" id="col-1">
        <div class="pt-5">
          <img src="images/giftcart.jpeg" width="50%">
        </div>
      </div>
    <div class="col-sm-12 col-md-6 pt-5" id="col-2">
    <div class="section mt-5">
      <div class="heading pt-5">
      <?php 
        session_start();
          if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
          header("location: logout_msg.php");
          }
      ?>
        <h3><?php echo "NO ORDERS PLACED!!";?></h3>
      </div>
      <div class="content">
        <div class="box">
        </div>
        <div class="box">
           <input type="button" class="nav-item m-3 p-3" name="continue shopping" value="Continue Shopping" onclick="document.location.href='product.php'">
        </div>
      </div>
    </div>
  </div>
  <footer> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
  </footer>
</body>
</html>
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
          <div class="heading">
            <h3></h3>
          </div>
          <div class="content">
          <form action="update_order2.php" method="post">
            <div class="box">
            </div>
            <div class="box">  
            <label for="status">Choose a option</label>
            <select name="status" id="status">
              <option value="PLACED">PLACED</option>
              <option value="DISPATCHED">DISPATCHED</option>
              <option value="SHIPPED">SHIPPED</option>
              <option value="DELIVERED">DELIVERED</option>
            </select>
            </div>
            <div class="box">
            </div>
            <div class="box">
              <input type="submit" name="Submit" class="nav-item m-3 p-3" value="Submit">
            </div>
          </form>
          </div> 
        </div>
      </div>
    </div>
  </div>
  <?php
    session_start();
    if (!isset($_SESSION['aloggedin']) && $_SESSION['aloggedin'] == false) {
      header("location: logout_msg.php");
    }  
  ?>
</body>
</html>
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
            <input type="button" name="back" value="Back" class="nav-item m-3 p-3" onclick="document.location.href='adminpage.php'">
          </div>
          <div>
            <input type="button" name="add Product" value="Add product" class="nav-item m-3 p-3" onclick="document.location.href='add_product.php'">
          </div>
          <div>
            <input type="button" name="logout" value="Logout" class="nav-item m-3 p-3" onclick="document.location.href='admin_logout.php'">
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
      <h3><strong>Products in stock</strong></h3>
    </div>
    <div class="row p-5 pt-2">
      <table class="table text-center table-danger table-bordered">
        <tr> 
          <th>Name</th>
          <th>Cost</th>
          <th>Description</th>
          <th>pic1</th>
          <th>pic2</th>
          <th>pic3</th>
          <th>pic4</th>
          <th>pic5</th>
        </tr>
        <?php

          include "dbConn.php"; // Using database connection file here

          $records = mysqli_query($db,"select * from products"); // fetch data from database

          while($data = mysqli_fetch_array($records))
          {
        ?>
        <tr>
          <td><?php echo $data['prod_name']; ?></td>
          <td><?php echo $data['cost']; ?></td> 
          <td><?php echo "<pre>".  $data["description"] . "</pre>" ;?> </td>
          <td> <img src="<?php echo $data['pic1']; ?>" width="100" height="100"> </td>
          <td> <img src="<?php echo $data['pic2']; ?>" width="100" height="100"> </td>
          <td> <img src="<?php echo $data['pic3']; ?>" width="100" height="100"> </td>
          <td> <img src="<?php echo $data['pic4']; ?>" width="100" height="100"> </td>
          <td> <img src="<?php echo $data['pic5']; ?>" width="100" height="100"> </td>
          <td> <a href="deleteprod.php?prod_id=<?php echo $data['prod_id']?>">
          <img src="images/delete.png" width="20" height="20"> </a>
          </td>
        </tr>	
        <?php
          }
        ?>
      </table>
    </div>
    <?php mysqli_close($db);  // close connection ?>
  </div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="images/g.webp" type="image/webp" sizes="16x16">    
<title>GIFTCART</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body class="log">
  <div class="container-fluid text-center pt-5 px-5">
    <div class="row px-5">
      <div class="col-sm-12 col-md-6 pt-5 text-center" id="col-1">
        <div class="pt-5 text-center">
          <img id="blah" src="#" class="m-5" height="350rem" max-width="200rem" onerror="this.onerror=null; this.src='images/giftcart.jpeg'"/>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 pt-5" id="col-2">
        <div class="section mt-5">
          <div class="heading">
            <h3>Upload your Customised<br> Image Here</h3>
          </div>
          <div class="content">
          <form action="addtocart.php" method="POST" enctype="multipart/form-data">
            <div class="box">
            </div>
            <div class="box">  
              <input type="file" onchange="readURL(this);" name="file">
            </div>
            <div class="box">
            </div>
            <div class="box">
              <input type="submit" class="nav-item m-3 p-3" value="Add to Cart">
            </div>
          </form>
          </div>  
          <div class="text-danger">
            <?php
              session_start();
              if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false) {
                header("location: logout_msg.php");
              }
              @$name = $_FILES['file']['name'];
              @$size = $_FILES['file']['size'];
              @$type = $_FILES['file']['type'];
              @$tmp_name = $_FILES['file']['tmp_name'];
              if (isset($name)) {
                  if (!empty($name)) 
                  {
                  $location = 'uploaded/';
                  if (move_uploaded_file($tmp_name, $location. $name));
                  $filename= $location . $name;
                  include "dbConn.php";
                  
                  $prod_id=$_SESSION['prod_id'];
                  $cust_id=$_SESSION['cust_id'];
                  mysqli_query($db,"INSERT INTO `cart_details` (cust_id,prod_id,image) values ('$cust_id','$prod_id','$filename')");
                  header("Location: upload.php");
                  }
                  else 
                  {
                      echo 'Please choose a file';
                  }
                  
              }
            ?> 
            <script language="javascript" type="text/javascript">
              function readURL(input) 
              {
                if (input.files && input.files[0]) 
                {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                    $('#blah')
                    .attr('src', e.target.result);
                  };
                  reader.readAsDataURL(input.files[0]);
                }
              }
            </script>
          </div>
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
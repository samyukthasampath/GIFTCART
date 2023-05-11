<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
        <h3>
          <?php
          session_start();
          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
              echo "Hello " . $_SESSION['cust_name'] . "!";
          }
          else {
            header("location: logout_msg.php");
          } 
          $cust_id=$_SESSION['cust_id'];
          $prod_id = $_GET['prod_id'];
          $_SESSION['prod_id']=$prod_id;
          include "dbConn.php";
          $records = mysqli_query($db,"select * from products where prod_id=$prod_id"); // fetch data from database
          $data = mysqli_fetch_array($records);
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
          <input type="button" name="myorders" class="nav-item m-3 p-3" value="My Orders" onclick="document.location.href='orders.php'">
          <input type="button" name="cart" value="My Cart" class="nav-item m-3 p-3" onclick="document.location.href='cart_details.php'">
          <input type="button" name="logout" value="Logout" class="nav-item m-3 p-3" onclick="document.location.href='logout.php'">
        </nav>
      </div>
    </div>
  </div>  
  
  <div class="container-fluid">
    <div class="row head mx-0 px-5">
      <div class="heading">
        <h1> <?php echo $data['prod_name']; ?></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="slideshow-container">
          <?php 
              $i=1;
              while($i<=5) {
          ?>
          <div class="mySlides fade">
            <div class="numbertext"><?php echo $i ?> / 5</div>
            <img src="<?php echo $data['pic'.$i]; ?>" style="width:100%;">
          </div>
          <?php 
              $i=$i+1;
              }
          ?>
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <div style="text-align:center">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
          <span class="dot" onclick="currentSlide(4)"></span>
          <span class="dot" onclick="currentSlide(5)"></span>
        </div>
      </div>
      <div class="col-md-6">
        <div class="m-3">
          <h4> COST </h4>
          <?php echo '&#8377;'.$data["cost"] ;?>
        </div>
        <div class="m-3">
          <h4> About this item </h4>
          <?php echo "<pre>".  $data["description"] . "</pre>" ;?>
        </div>
        <input type="button" name="add to cart" class="nav-item m-3 p-3" value="Add to Cart" onclick="document.location.href='addtocart.php'">
      </div>
    </div>
  </div>
  <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
  </script>
  <footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
  </footer>
</body>
</html> 
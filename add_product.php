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
                    <input type="button" name="Products" value="Products" class="nav-item m-3 p-3" onclick="document.location.href='admin_product.php'">
                </div>
                <div>
                    <input type="button" name="Orders" value="Orders" class="nav-item m-3 p-3" onclick="document.location.href='admin_orders.php'">
                </div>
                <div>
                    <input type="button" name="logout" value="Logout" class="nav-item m-3 p-3" onclick="document.location.href='admin_logout.php'">
                </div>
                </nav>
            </div>
        </div>
        <?php
            include "dbConn.php"; // Using database connection file here
            if(isset($_POST['submit']))
            {
                include "dbConn.php";
                $Name = $_POST['Name'];
                $cost = $_POST['cost'];
                $description = $_POST['description'];
                $pic1="images/".$_POST['pic1'];
                $pic2="images/".$_POST['pic2'];
                $pic3="images/".$_POST['pic3'];
                $pic4="images/".$_POST['pic4'];
                $pic5="images/".$_POST['pic5'];
                $insert = mysqli_query($db,"INSERT INTO products(prod_name,cost,description,pic1,pic2,pic3,pic4,pic5) VALUES ('$Name','$cost','$description','$pic1','$pic2','$pic3','$pic4','$pic5')");
                if(!$insert)
                {
                    echo "Error inserting";
                }
                else
                {
                    header("Location: admin_product.php");
                }
            }
            mysqli_close($db); // Close connection
        ?>
    </div>  
    <div class="row px-5 mx-5">
        <div class="col-md-6 py-5" id="col-1">
            <div class="pt-5">
            <img id="blah" src="#" class="m-5" height="350rem" max-width="200rem" onerror="this.onerror=null; this.src='images/giftcart.jpeg'"/>
            </div>
        </div>
        <div class="col-md-6 py-5" id="col-2">
            <div class="section p-5 mx-5">
                <h3><strong>Enter the Product Details</h3>
            </div>
            <form method="POST">
                <table class="table table-borderless mx-5">
                <tr>
                    <td><label for="Name">Product Name</label></td>
                    <td><input type="text"  name="Name" required></td>
                </tr>
                <tr>
                    <td><label for="cost">Cost</label></td>
                    <td><input type="text" name="cost" required></td>
                </tr>
                <tr>
                    <td><label for="descritption">Description</label></td>
                    <td><textarea name="description" style="width:400px;" rows="4" cols="50"></textarea></td>
                </tr>
                <tr>
                    <td><label for="pic1">Picture1 </label></td>
                    <td><input type="file" name="pic1" onchange="readURL(this);" required></td>
                </tr>
                <tr>
                    <td><label for="pic2">Picture2 </label></td>
                    <td><input type="file" name="pic2" onchange="readURL(this);" required></td>
                </tr>
                <tr>
                    <td><label for="pic3">Picture3</label></td>
                    <td><input type="file" name="pic3" onchange="readURL(this);" required></td>
                </tr>
                <tr>
                    <td><label for="pic4">Picture4</label></td>
                    <td><input type="file" name="pic4" onchange="readURL(this);" required></td>
                </tr>
                <tr>
                    <td><label for="pic5">Picture5</label></td>
                    <td><input type="file" name="pic5" onchange="readURL(this);" required></td>
                </tr></strong>
                <tr colspan="2">
                    <td><input type="submit" class="nav-item m-3 p-3" name="submit" value="Submit"></td>
                </tr>
                </table>
            </form>
        </div>
    </div>
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
</body>
</html>
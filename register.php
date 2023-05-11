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
    <input type="button" name="back" value="back" class="btn-light btn-outline-danger mx-3 mt-3" onclick="document.location.href='index.php'">
    <div class="container-fluid pt-5 px-5">
        <div class="row text-center px-5">
            <div class="col-sm-12 col-md-6 pt-5" id="col-1">
                <div class="pt-5">
                    <img src="images/giftcart.jpeg" width="50%">
                </div>
            </div>
            <div class="col-sm-12 col-md-6 py-5" id="col-2">
                <div class="section my-0">
                    <div class="heading">
                        <h3>Register</h3>
                    </div>
                    <div class="content">
                        <form method="POST">
                            <div class="box">
                                <input type="text" class="place" placeholder="Enter Name" name="Name" required>
                            </div>
                            <div class="box">
                                <input type="text" class="place" placeholder="Enter username" name="Username" required>
                            </div>
                            <div class="box">
                                <input type="password" class="place" placeholder="Enter password" name="Password" required>
                            </div>
                            <div class="box">
                                <input type="password" class="place" placeholder="Confirm password" name="ConfirmPass" required>
                            </div>
                            <div class="box">
                                <input type="textarea" class="place" placeholder="Enter address" name="Address" required>
                            </div>
                            <div class="box">
                                <input type="text" class="place" placeholder="Enter phonenumber" name="Phonenumber" required>
                            </div>
                            <div class="box">
                                <input type="submit" name="submit" class="btn" value="Submit">    
                            </div>
                        </form>
                    </div>
                    <div class="text-danger">
                        <?php
                            include "dbConn.php"; // Using database connection file here

                            if(isset($_POST['submit']))
                            {
                                $Name = $_POST['Name'];
                                $Username = $_POST['Username'];
                                $Password = $_POST['Password'];
                                $Confirm = $_POST['ConfirmPass'];
                                $Address = $_POST['Address'];
                                $Phonenumber = $_POST['Phonenumber'];
                                if ($Password != $Confirm)
                                {
                                    echo 'Passwords Dont Match!';
                                }
                                else
                                {
                                    $insert = mysqli_query($db,"INSERT INTO `customer`(cust_name, username, password, address, phno) VALUES ('$Name','$Username','$Password','$Address','$Phonenumber')");

                                    if(!$insert)
                                    {
                                        echo "Username already exists!!";
                                    }
                                    else
                                    {
                                        header("Location: redirect.php");
                                    }
                                }
                            }

                            mysqli_close($db); // Close connection
                        ?>
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
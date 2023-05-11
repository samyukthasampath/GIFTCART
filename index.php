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
                        <h3>Sign In</h3>
                    </div>
                    <div class="content">
                        <form action="index.php" method="POST">
                            <div class="box">
                                <input type="text" class="place" placeholder="Enter username" name="Username">
                            </div>
                            <div class="box">
                                <input type="password" class="place" placeholder="Enter password" name="Password">
                            </div>
                            <div class="box">
                                <input type="submit" name="submit" class="btn" value="Sign In">
                            </div>
                        </form>
                    </div>
                    <div class="content box">
                            <blockquote>Not a registered user? 
                                <a href="register.php"> Sign Up</a>
                            </blockquote>
                    </div>
                    <div class="text-danger">
                        <?php
                        session_start();
                        include "dbConn.php"; // Using database connection file here
                        if(isset($_POST['submit'])) {
                            $username = $_POST['Username'];
                            $password = $_POST['Password'];
        
                            // To protect MySQL injection (more detail about MySQL injection)
                            $username = stripslashes($username);
                            $password = stripslashes($password);
                            $username = mysqli_real_escape_string($db,$username);
                            $password = mysqli_real_escape_string($db,$password);
                            if($password == '1234' && $username== 'ishu') {
                                $_SESSION['aloggedin'] = true;
                                header("Location: adminpage.php");
                            }
                            $sql = "SELECT * FROM `customer` WHERE username='$username'";
                            $result = mysqli_query($db,$sql);

                            // Mysql_num_row is counting the table rows
                            $count=mysqli_num_rows($result);
                            // If the result matched $username and $password, the table row must be one row
                            if($count > 0){
                                //fetch associate array of the tuple in $result into $row
                                $row = mysqli_fetch_assoc($result);
                                if($password == $row["password"]) {
                                    session_start();
                                    $_SESSION['loggedin'] = true;
                                    $_SESSION['username'] = $username;
                                    $_SESSION['cust_name'] = $row["cust_name"];
                                    $_SESSION['cust_id']= $row["cust_id"];
                                    header("Location: product.php");
                                }
                                else {
                                    echo "***Incorrect Password***";
                                }
                            }
                            else {
                                echo "***Incorrect username***";      
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
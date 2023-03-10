<!DOCTYPE html>
<html lang="en">
<head>
  <title>MyCart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Competible" content="ie=edge">
  <link href="Styles/style.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

</head>
<body>

<div class="container-fluid">
    <div class="row" id="storeHead">
        <div class="col-2 col-sm-2">
                  <img src="Assets/ComIcon.jpg" alt="Company Logo" style="width: 64px; height: 64px;" class="companyLogo">
        </div>
        <div class="col-8 col-sm-8">
                  <h1 id="headerText">CART-D<b> My-Cart</b></h1>
        </div>
        <div class="col-2 col-sm-2">
            <?php
            include("config.php");
            $q1 = "SELECT avatarSrc FROM users WHERE userID = $userID";
            $res = $conn->query($q1);

                if ($res->num_rows > 0) {
                  while($r = $res->fetch_assoc()) {
                    $avatar1 = "Assets/profilePic/".$r["avatarSrc"];
                }}
            //mysqli_close($conn);

            ?>
                <img src="<?php echo $avatar1; ?>" alt="Avatar Logo" style="width: 28px; height: 28px;" class="myicon rounded-pill "> <br/><?php echo $userName; ?><br/><a href='logout.php'> <small><u>LogOut</u></small></a> 
        </div>
    </div>
    
    <div class="row"> 
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#abc" aria-controls="abc" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="abc">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="index.php"><b>Product Store</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="mycart.php"><b>My Cart</b></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="aboutus.php"><b>About Us</b></a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </nav>
    </div>


    <div class="row" id="cart">
        <br><br>

    <?php
            include ("config.php");
            //$_SESSION['userID']=$userID;

            $sql = "SELECT productID FROM usercart WHERE userID= '$userID' ";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $productID = $row["productID"];

                    $sql1 = "SELECT * FROM products WHERE productID='$productID' ";
                    $result1 = $conn->query($sql1);

                    if($result1->num_rows > 0){
                        while($row2 = $result1->fetch_assoc()){
                            ?>
                            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-12 col-12" >
                            <?php

                            echo "<div class='cartitem' "."id=".$productID.">";
                            echo "<h3 class="."title".">" .$row2["productName"] ."</h3>";
                            echo "<img src=$row2[productImgSrc] height='120' width='auto'>";
                            echo "<p class="."category".">" .$row2["productCategory"] ."</p>";
                            echo "<p>" .$row2["productDiscription"] . "</p>";
                            echo "<p class="."price".">LKR ".$row2["productPrice"]. ".00</p>";
                            echo "<button class="."paybutton"."><b>Buy Now</b></button>";
                            echo " ";
                            echo "<button onClick= "."remFrmCART($productID) "." class="."rmvbutton"."><b>Remove</b></button>";

                            echo "</div>";
                            echo "</div>";
                        }
                    }
                }
            }





        ?>

            <script type="text/javascript">
                
                     function remFrmCART(abc){
                        alert (abc);
                        var pID = abc;
                       
                        $.ajax({
                            url:'ContentSource/user/removeFromCart.php',
                            type: 'POST',
                            data: {pID},
                            success: function(data) {
                                var x = JSON.stringify(data);
                                console.log(x);
                                alert(x);
                            }
                            

                        });

                        document.getElementById(pID).innerHTML = "Successfully Removed!";

                     }
                
            </script>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

    </div>

    <div class="row">
        <div id="footer">
            <p> &#169; CART-D ICT DEPARTMENT 2023 </p>
            <p><small> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</small></p>
        </div>
        
    </div>

   

  
</div>

</body>
</html>
<?php 


$url =  $_SERVER['QUERY_STRING'];

$productID = ltrim(strstr($url, '='), '=');

//echo "Product ID = ".$productID;

include ("../../config.php");

$sql = "SELECT * FROM products WHERE productID= '$productID' ";
$result = $conn->query($sql);

if ($result->num_rows ==1 ) {
    while($row = $result->fetch_assoc()) {
        $productName = $row["productName"];
        $productCate = $row["productCategory"];
        $productDis = $row["productDiscription"];
        $productPrice = $row["productPrice"];
        $productImg = $row["productImgSrc"];
    }
}


?>

    <div id="addItem">
        <form action="#" method="POST">
          <label for="productname">Product Name:</label><br>
          <input type="text" id="productname" name="productname" value="<?php echo $productName; ?>"><br>

          <label for="productCategory">Product Category:</label><br>
          <input type="text" id="productCategory" name="productCategory" value="<?php echo $productCate; ?>" ><br>

          <label for="productDiscription">Product Discription:</label><br>
          <input type="textarea" id="productDiscription" name="productDiscription" value=" <?php echo $productDis; ?>"><br>

          <label for="productPrice">Product Price:</label><br>
          <input type="text" id="productPrice" name="productPrice" value="<?php echo $productPrice; ?>"><br>

          <label for="productImgURL">Product Image URL:</label><br>
          <input type="textbox" id="productImgURL" name="productImgURL" value="<?php echo $productImg; ?>"><br>


          <br>
          <input type="submit" value="Submit">
        </form> 

        <a href="adminStore.php">Store </a>
    </div>


    
  
</div>

<?php

if($_POST){

    include("../../config.php");

    $proName= $_POST['productname'];
    $proCat= $_POST['productCategory'];
    $proDis= $_POST['productDiscription'];
    $proPrice= $_POST['productPrice'];
    $proImg= $_POST['productImgURL'];

    $sql = "UPDATE `products` SET productName='$proName' , productCategory='$proCat', productDiscription='$proDis', productPrice='$proPrice', productImgSrc='$proImg' WHERE productID = '$productID' ";

    if ($conn->query($sql) === TRUE) {
      echo "New record updated successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }





}


?>

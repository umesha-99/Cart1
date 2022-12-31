<?php

include ("../../config.php");
session_start();
$userID = $_SESSION["userID"];
$productID = $_POST['pID'];

$sql = "SELECT productID, userID FROM usercart WHERE userID = '$userID' AND productID = '$productID' ";
$result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "This Product Already added!";
            }else{
                $sql1 = "INSERT INTO usercart (`userID`, `productID`) VALUES ('$userID', '$productID')";
                  if ($conn->query($sql1) === TRUE) {
                    echo "New record created successfully".$userID;
                  } else {
                    echo "Error: " . $sql1 . "<br>" . $conn->error;
                  }
            }






?>
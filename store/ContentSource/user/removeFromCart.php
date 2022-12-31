<?php

include("../../config.php");
session_start();
$userID = $_SESSION["userID"];
$productID = $_POST['pID'];

$sql = "DELETE FROM usercart WHERE userID = '$userID' AND productID = '$productID' ";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}




?>
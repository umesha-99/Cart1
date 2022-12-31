<?php
session_start();
if(!$_SESSION['auth']){
    header('location:login.php');
}else{
    $userID = $_SESSION["userID"];
    $_SESSION['userID']=$userID;
    $userName = $_SESSION["userName"];
    $_SESSION['userName']=$userName;
    include("ContentSource/user/user_aboutus_page.php");


}



?>
<?php
session_start();
if(!$_SESSION['auth']){
    header('location:login.php');
}else{
    $userID = $_SESSION["userID"];
    $_SESSION['userID']=$userID;
    $userName = $_SESSION["userName"];
    $_SESSION['userName']=$userName;
    $role = $_SESSION["role"];
    $_SESSION['role']=$role;
    if($role == "user"){
        include("ContentSource/user/user_mycart_page.php");
    }else{
        echo "       Invalid Login!";
    }


}



?>
<?php
include_once("../../db/db.php");
session_start();

if(isset($_POST['orderCloth'])){
    
    echo $clientUId = $_SESSION['clientUId'];
    echo $couponId =  $_POST['couponId'];
    echo $date = date('d-m-Y');
    echo $time = date("h:i:sa");
    
    
    $query = "UPDATE `winner_coupons` SET `orderType`='buy cloth',requestedTime='$time',requestedDate='$date'
    WHERE clientUId = $clientUId AND couponId = $couponId" ;
    $exe=mysqli_query($conn,$query);
    if($exe)
    {
        $_SESSION["message"] = "Your request has been sent.<br> Order will sent to your address";
        $_SESSION["msgClr"] = "green";
        header("Location:../status.php");
    } else{
        
        $_SESSION["message"] = "Error while updting. Please contact to Admin";
        $_SESSION["msgClr"] = "red";
        header("Location:../status.php");
    }
    
}
?>
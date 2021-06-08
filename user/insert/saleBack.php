<?php
include_once("../../db/db.php");
session_start();

if(isset($_POST['saleBack'])){
    
    $clientUId = $_SESSION['clientUId'];
    $couponId =  $_POST['couponId'];
    $reason = $_POST['reason'];
    $date = date('d-m-Y');
    $time = date("h:i:sa");
    
    $query = "UPDATE `winner_coupons` SET `orderType`='sale back',`reason`='$reason',requestedTime='$time',requestedDate='$date'
    WHERE clientUId = $clientUId AND couponId = $couponId" ;
    $exe=mysqli_query($conn,$query);
    if($exe)
    {
        $_SESSION["message"] = "Your request has been sent.<br> Amount will be transferred to your account  within 2 or 3 working days";
        $_SESSION["msgClr"] = "green";
        header("Location:../status.php");
    } else{
        
        $_SESSION["message"] = "Error while updting. Please contact to Admin";
        $_SESSION["msgClr"] = "red";
        header("Location:../status.php");
    }
    
}
?>
<?php
session_start();
include_once ("../../db/db.php");

if(isset($_POST['clientUId'])){
    $clientUId =  $_POST['clientUId'];
    $couponId  = $_POST['couponId'];
    $date = date('d-m-Y');
    $time = date("h:i:sa");
    
    $query = "UPDATE `client_profile` SET `winner`='yes' WHERE clientUId= '$clientUId'";
    $exe = mysqli_query($conn, $query);
    if($exe){
        
        $query = "INSERT INTO `winner_coupons`(`date`, `time`, `couponId`, `clientUId`) VALUES
        ('$date','$time','$couponId','$clientUId')";
        
        $exe = mysqli_query($conn, $query);
        if(!$exe){
            echo "Error while adding winner_coupons";
        } 
        
        
    } else {
        echo "Error while updating winner";
    } 
    
   
    
    
    
    
}

?>
<?php
session_start();
include_once ("../../db/db.php");

if(isset($_POST['couponId'])){
    $couponId  = $_POST['couponId'];
    $date = date('d-m-Y');
    $time = date("h:i:sa");
    
    $query = "UPDATE `winner_coupons` SET `published`='yes' WHERE couponId = $couponId";
    $exe = mysqli_query($conn, $query);
    if(!$exe){
        echo "Error while updatating winners_coupons table"; 
        exit();
    } 
    
    $query = "DELETE FROM `coupons_sold` WHERE couponId = $couponId";
    $exe = mysqli_query($conn, $query);
    if(!$exe){
        echo "Error while deleteting coupons_sold  table";
        exit();
    } 
    
    $query = "UPDATE `coupons` SET `displayType`='hide' WHERE couponId = '$couponId' ";
    $exe = mysqli_query($conn, $query);
    if(!$exe){
        echo "Error while updating coupons  table";
        exit();
    } 
    
    $sel = "SELECT clientUId FROM winner_coupons WHERE couponId = '$couponId'";
    $execute = mysqli_query($conn, $sel);
    if (mysqli_num_rows($execute) > 0) {
        
        while ($data = mysqli_fetch_assoc($execute)) {
            
            $clientUId = $data['clientUId'];
            $query = "UPDATE `client_profile` SET `winner`='no' WHERE clientUId = $clientUId";
            $exe = mysqli_query($conn, $query);
            if(!$exe) {
                echo "Error while updating winner as no in client_profile";
                exit();
            }
            
            $query = "UPDATE `payment_trials` SET `triedTimes`='0' WHERE clientUId = $clientUId";
            $exe = mysqli_query($conn, $query);
            if(!$exe) {
                echo "Error while updating payment_trials";
                exit();
            }
        }
    }
    
   
    
    
    
    
}

?>
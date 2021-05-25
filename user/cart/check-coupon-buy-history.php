<?php
include_once ("../db/db.php");
session_start();

if(isset($_POST['couponId'])){
    $couponId = $_POST['couponId'];
    $clientUId = $_SESSION['clientUId'];
    $query = "SELECT * FROM `coupons_history` WHERE clientUId = '$clientUId' and couponId = '$couponId'";
    $exe = mysqli_query($conn, $query);
    $count = mysqli_num_rows($exe) ; 
    if($count == 10 ){
        echo 400;
    }else if($count < 10) {
        echo 200;
    }
    
    
    
}
?>
<?php 
include_once ("../../db/db.php");
 $clientUId= $_POST['clientUId'] ;
$couponId= $_POST['couponId'] ;
$code = $_POST['code'];
$description =  $_POST['description'] ;
$source= $_POST['source'] ;
$step= $_POST['step']  ;
$reason= $_POST['reason'] ;
$orderId= $_POST['orderId'] ;
$paymentId=$_POST['paymentId'] ;

$query = "INSERT INTO `failed_orders`( `couponId`, `clientUId`, `code`, `description`, `source`, `step`, `reason`, `orderId`, `paymentId`) 
VALUES ('$couponId','$clientUId','$code','$description','$source','$step','$reason','$orderId','$paymentId')";
$exe = mysqli_query($conn,$query);
if($exe){
   // echo mysqli_error($conn);
    echo 200;

}else{
    //echo mysqli_error($conn);
    echo 400;
}







?>

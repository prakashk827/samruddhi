<?php
session_start();
include_once("../../db/db.php");
if(isset($_POST['couponId']) && isset($_POST['qty'])){
    $couponId=$_POST['couponId'];
    $qty=$_POST['qty'];
    $paymentStatus="pending";
    $boughtOn=date('Y-m-d');
  	$clientUId = $_SESSION["clientUId"];

   $query="SELECT * FROM `coupons` WHERE  id='$couponId'";
	$exe=mysqli_query($conn,$query);
	if(mysqli_num_rows($exe)>0){
        
         $data=mysqli_fetch_assoc($exe);
         echo $couponId = $data['id'];
         echo $couponPrice = $data['couponPrice'];
         exit();

         $paidAmt = $qty * $couponPrice;
         $query =  "INSERT INTO `coupons_sold`(`clientUId`, `couponId`, `paymentStatus`, `boughtOn`, `boughtQty`, `paidAmt`) VALUES ('$clientUId','$couponId','$paymentStatus','$boughtOn','$qty','$paidAmt')";
        $exe=mysqli_query($conn,$query);
        if(!$exe){
        	echo "Error while inserting coupon pk";
        	exit();
        }
         echo $_SESSION['couponId']=mysqli_insert_id($conn);

         $query="SELECT * FROM `payment_trials` WHERE clientUId = '$clientUId'";
         $exe=mysqli_query($conn,$query);
         $data=mysqli_fetch_assoc($exe);
         $updateTriedTimes = $data['triedTimes']+1;
         
         $query="UPDATE `payment_trials` SET `triedTimes`='$updateTriedTimes' WHERE clientUId=$clientUId";
          $exe=mysqli_query($conn,$query);
         if(!$exe){
            echo "Error while updating payment trials";
         }
          
      }else{
        echo "Error while fetching coupon";
      }
 }


if(isset($_POST['payment_id']) && isset($_SESSION['couponId'])){
    $payment_id=$_POST['payment_id'];
    $couponId = $_SESSION['couponId'];
    $query= "UPDATE `coupons_sold` SET `paymentStatus`='complete',`transactionId`='$payment_id' 
    WHERE id = $couponId";
     $exe=mysqli_query($conn,$query);
         if(!$exe){
            echo "Error while updating payment complete status";
         }

}
?>
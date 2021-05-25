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
	if(mysqli_num_rows($exe)>0)
      {
        
         $data=mysqli_fetch_assoc($exe);
         $id = $data['id'];
         $couponName = $data['couponName'];
         $description= $data['description'];
         $startDate = $data['startDate'];
         $endDate = $data['endDate'];
         $couponPrice = $data['couponPrice'];
         $status = $data['status'];
         $displayType = $data['displayType'];

         $paidAmt = $qty * $couponPrice;



         $query = "INSERT INTO `coupons_sold`(`clientUId`, `couponName`, `couponId`, `paymentStatus`, `description`, `startDate`, `endDate`, `couponPrice`, `status`, `boughtOn`,`boughtQty`,`paidAmt`) VALUES ('$clientUId','$couponName','$couponId','$paymentStatus','$description','$startDate','$endDate','$couponPrice','$status','$boughtOn','$qty','$paidAmt')";
        $exe=mysqli_query($conn,$query);
        if(!$exe){
        	echo "Error while inserting coupon";
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
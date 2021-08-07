<?php
include_once("../../db/db.php");
session_start();

if(isset($_POST['orderCloth'])){

    $date = date('d-m-Y');
    $time = date("h:i:sa");

    $clientUId = $_SESSION['clientUId'];
    $couponId =  $_POST['couponId'];

    $qtyModal = $_POST['qtyModal'];
    $sizeModal = $_POST['sizeModal'];
    $fabricModal = $_POST['fabricModal'];
    $categoryModal = $_POST['categoryModal'];
    $totalPriceModal=$_POST['totalPriceModal'];
    $discountModal = $_POST['discountModal'];
    $afterDiscountModal = $_POST['afterDiscountModal'];
    $status = 'pending';

    $query = "INSERT INTO `winner_cloth_orders`
    ( `date`, `time`, `clientUId`,`couponId`, `qty`, `size`, `fabric`, `category`, `totalPrice`, `discount`, `afterDiscount`, `status`)
     VALUES ('$data','$time','$clientUId','$couponId','$qtyModal','$sizeModal','$fabricModal','$categoryModal','$totalPriceModal','$discountModal','$afterDiscountModal','$status')";
   
   $exe=mysqli_query($conn,$query);
    
   if($exe){
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
                }else{
                   
                    $_SESSION["message"] = "Error while adding client cloth order : ". mysqli_error($conn);
                    
                    $_SESSION["msgClr"] = "red";
                    header("Location:../status.php");
                }     
}
?>
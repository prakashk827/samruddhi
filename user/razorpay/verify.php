<?php

require('config.php');
include_once("../../db/db.php");
session_start();

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();

    }
}

if ($success === true)
{
             //Updating payment status
             $date = date('d-m-Y');
             $time = date('h:i:sa');
             $paymentId = $_POST['razorpay_payment_id'];
             $soldCouponId = $_SESSION['soldCouponId'];
             $couponId = $_SESSION['couponId'] ;
             $qty  = $_SESSION['QTY'];
             $clientUId = $_SESSION['clientUId'];
             $query = "UPDATE `coupons_sold` SET 
            `paymentStatus`='complete',
            `transactionId`='$paymentId',
            `time`='$time',
             `boughtOn`='$date'
             WHERE id = $soldCouponId ";
             
             $exe=mysqli_query($conn,$query);
             if($exe){
                 
                //Reducing coupons
                $sel = "SELECT * FROM `coupons` WHERE id = '$couponId'";
                $exe = mysqli_query($conn, $query);
                $data = mysqli_fetch_assoc($exe);
                $soldCoupons = $data['soldCoupons']  + $qty;
                $query = "UPDATE `coupons` SET `soldCoupons`='$soldCoupons' WHERE id = $couponId"; 
                $exe=mysqli_query($conn,$query);
                $_SESSION["message"] = "Your payment was successful..!";
                $_SESSION["msgClr"] = "green";
                header("Location:../status.php");
             }
}
else {

             $paymentId = $_POST['razorpay_payment_id'];
             $soldCouponId = $_SESSION['soldCouponId'];
             $query = "UPDATE `coupons_sold` SET `paymentStatus`='failed' WHERE id = $soldCouponId ";
             $exe=mysqli_query($conn,$query);
             if($exe){
                $_SESSION["message"] = "Your payment failed..!";
                $_SESSION["msgClr"] = "red";
                header("Location:../status.php");
            }
}



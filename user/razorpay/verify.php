<?php
require ('config.php');
include_once ("../../db/db.php");
session_start();

require ('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
    // Updating payment status
    $date = date('d-m-Y');
    $time = date('h:i:sa');
    $paymentId = $_POST['razorpay_payment_id'];

    $couponId = $_SESSION['couponId'];
    $qty = $_SESSION['QTY'];
    $clientUId = $_SESSION['clientUId'];

    $query0 = "SELECT MAX(luckyNumber) AS maxLuckyNum FROM coupons_sold WHERE couponId=$couponId";
    $exeQ = mysqli_query($conn, $query0);
    $maxLuckyNum = mysqli_fetch_assoc($exeQ);
   $luckyNo = $maxLuckyNum['maxLuckyNum'];
    if ($luckyNo == null) {
        $luckyNo = 0;
    }
    for ($i = 0; $i < $qty; $i ++) {
         $soldCouponId = $_SESSION['soldCouponIdArray'][$i];
       echo "lu" .$luckyNo = $luckyNo + 1;

        $query = "UPDATE `coupons_sold` SET `luckyNumber`='$luckyNo', `paymentStatus`='complete', `transactionId`='$paymentId',`time`='$time',`boughtOn`='$date'
        WHERE id = $soldCouponId";
        $exe = mysqli_query($conn, $query);
    }

    if ($exe) {
        //Get Total count of the current sold coupon

        $couponCount = "SELECT COUNT(id) AS totalCoupons FROM coupons_sold WHERE paymentStatus = 'complete' AND couponId = $couponId ";
        $exe = mysqli_query($conn, $couponCount);
        $data = mysqli_fetch_assoc($exe);
        $result = $data['totalCoupons'];

        $query = "UPDATE `coupons` SET `soldCoupons`='$result' WHERE id = $couponId";
        $exe = mysqli_query($conn, $query);



        $_SESSION["message"] = "Your payment was successful..!";
        $_SESSION["msgClr"] = "green";
        header("Location:../status.php");
    } else {
        echo "error";
    }
} else {

    $paymentId = $_POST['razorpay_payment_id'];
    $soldCouponId = $_SESSION['soldCouponId'];
    for ($i = 0; $i < $qty; $i ++) {
        $soldCouponId = $_SESSION[' soldCouponIdArray'][$i];
        $query = "UPDATE `coupons_sold` SET `paymentStatus`='failed' WHERE id = $soldCouponId";
        $exe = mysqli_query($conn, $query);

    }
    if ($exe) {
        $_SESSION["message"] = "Your payment failed..!";
        $_SESSION["msgClr"] = "red";
        header("Location:../status.php");
    }
}



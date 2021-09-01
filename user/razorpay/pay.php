<?php
include_once ("../../db/db.php");
require ('config.php');
require ('razorpay-php/Razorpay.php');
session_start();
use Razorpay\Api\Api;

if (isset($_POST['couponId']) && isset($_POST['qty'])) {
    
    $date = date('d-m-Y');
    $time = date('h:i:sa');
    $couponId = $_POST['couponId'];
    $qty = $_POST['qty'];
    $paymentStatus = "pending";
    $boughtOn = date('d-m-Y');
    $clientUId = $_SESSION["clientUId"];
    $_SESSION['QTY'] = $qty;
    
    $query = "SELECT * FROM `coupons` WHERE  id='$couponId'";
    $exe = mysqli_query($conn, $query);
    if (mysqli_num_rows($exe) > 0) {
        
        $data = mysqli_fetch_assoc($exe);
        $totalCoupons = $data['totalCoupons'];
        $soldCoupons = $data['soldCoupons'];

        $couponsLeft = $totalCoupons - $soldCoupons;

        if($qty > $couponsLeft) {
            $_SESSION["message"] = "You are allowed to buy only less than or equals to ".$couponsLeft." coupons.";
            $_SESSION["msgClr"] = "red";
            header("Location:../status.php");
        }
        
        $couponId = $data['id'];
        $couponPrice = $data['couponPrice'];
        $couponName = $data['couponName'];
        $description = $data['description'];
        $paidAmt = $couponPrice;
        $razorPayAmt = $qty * $couponPrice;
        $soldCouponIdArray=array();
        for ($i = 0; $i < $qty; $i ++) {
         $query = "INSERT INTO `coupons_sold`(`clientUId`, `couponId`, `paymentStatus`, `boughtQty`, `paidAmt`,`time`,`date`) 
         VALUES ('$clientUId','$couponId','$paymentStatus','1','$paidAmt','$time','$date')";
            $exe = mysqli_query($conn, $query);
            if (! $exe) {
                $_SESSION["message"] = "Error while inserting coupon";
                $_SESSION["msgClr"] = "red";
                header("Location:../status.php");
                
                
            }
            $soldCouponIdArray[$i] =  mysqli_insert_id($conn);
           
            $_SESSION['couponId'] = $couponId;
            
            $query = "SELECT * FROM `payment_trials` WHERE clientUId = '$clientUId'";
            $exe = mysqli_query($conn, $query);
            $data = mysqli_fetch_assoc($exe);
            $updateTriedTimes = $data['triedTimes'] + 1;
            
            $query = "UPDATE `payment_trials` SET `triedTimes`='$updateTriedTimes' WHERE clientUId=$clientUId";
            $exe = mysqli_query($conn, $query);
            if (! $exe) {
                $_SESSION["message"] = "Error while updating payment trials";
                $_SESSION["msgClr"] = "red";
                header("Location:../status.php");
               
            }
            
        //Payment Process
        }  
        $_SESSION['soldCouponIdArray'] = $soldCouponIdArray ;
    } else {
       
                $_SESSION["message"] = "Error while fetching coupon";
                $_SESSION["msgClr"] = "red";
                header("Location:../status.php");
    }
    
    
    // Create the Razorpay Order
    
    $api = new Api($keyId, $keySecret);
    
    //
    // We create an razorpay order using orders api
    // Docs: https://docs.razorpay.com/docs/orders
    //
    $orderData = [
        'receipt' => $couponId.' | '.$clientUId,
        'amount' => $razorPayAmt * 100, // 2000 rupees in paise
        'currency' => 'INR',
        'payment_capture' => 1 // auto capture
    ];
    
    $razorpayOrder = $api->order->create($orderData);
    
    $razorpayOrderId = $razorpayOrder['id'];
    
    $_SESSION['razorpay_order_id'] = $razorpayOrderId;
    
    $displayAmount = $amount = $orderData['amount'];
    
    if ($displayCurrency !== 'INR') {
        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
        $exchange = json_decode(file_get_contents($url), true);
        
        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
    }
    
    $checkout = 'manual';
    
    if (isset($_GET['checkout']) and in_array($_GET['checkout'], [
        'automatic',
        'manual'
    ], true)) {
        $checkout = $_GET['checkout'];
    }
    
    $data = [
        "key" => $keyId,
        "amount" => $paidAmt,
        "name" => $couponName,
        "description" => $description,
        "image" => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
        "prefill" => [
            "name" => "Daft Punk",
            "email" => "customer@merchant.com",
            "contact" => $clientUId
        ],
        "notes" => [
            "address" => "",
            "merchant_order_id" => $couponId
        ],
        "theme" => [
            "color" => "#007D71"
        ],
        "order_id" => $razorpayOrderId
    ];
    
    if ($displayCurrency !== 'INR') {
        $data['display_currency'] = $displayCurrency;
        $data['display_amount'] = $displayAmount;
    }
    
    $json = json_encode($data);
    
    require ("checkout/{$checkout}.php");
}
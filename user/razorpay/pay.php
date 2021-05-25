<?php
include_once("../../db/db.php");
require('config.php');
require('razorpay-php/Razorpay.php');
session_start();
use Razorpay\Api\Api;

if(isset($_POST['couponId']) && isset($_POST['qty'])){

    $couponId = $_POST['couponId'];
    $qty = $_POST['qty'];
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
          $_SESSION['soldCouponId']=mysqli_insert_id($conn);

         $query="SELECT * FROM `payment_trials` WHERE clientUId = '$clientUId'";
         $exe=mysqli_query($conn,$query);
         $data=mysqli_fetch_assoc($exe);
         $updateTriedTimes = $data['triedTimes']+1;
         
         $query="UPDATE `payment_trials` SET `triedTimes`='$updateTriedTimes' WHERE clientUId=$clientUId";
          $exe=mysqli_query($conn,$query);
         if(!$exe){
            echo "Error while updating payment trials";
         }

         //Payment Process
          
      }else{
        echo "Error while fetching coupon";
      }
        

        // Create the Razorpay Order
        
        $api = new Api($keyId, $keySecret);

        //
        // We create an razorpay order using orders api
        // Docs: https://docs.razorpay.com/docs/orders
        //
        $orderData = [
            'receipt'         => $couponId,
            'amount'          => $paidAmt  * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];

        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        $displayAmount = $amount = $orderData['amount'];

        if ($displayCurrency !== 'INR')
        {
            $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
        }

        $checkout = 'manual';

        if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
        {
            $checkout = $_GET['checkout'];
        }

        $data = [
            "key"               => $keyId,
            "amount"            => $paidAmt,
            "name"              =>  $couponName,
            "description"       => $description,
            "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
            "prefill"           => [
            "name"              => "Daft Punk",
            "email"             => "customer@merchant.com",
            "contact"           => $clientUId,
            ],
            "notes"             => [
            "address"           => "",
            "merchant_order_id" => $couponId,
            ],
            "theme"             => [
            "color"             => "#007D71"
            ],
            "order_id"          => $razorpayOrderId,
        ];

        if ($displayCurrency !== 'INR')
        {
            $data['display_currency']  = $displayCurrency;
            $data['display_amount']    = $displayAmount;
        }

        $json = json_encode($data);

        require("checkout/{$checkout}.php");
}
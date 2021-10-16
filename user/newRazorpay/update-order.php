<?php

    include_once ("../../db/db.php");
    $date = date('d-m-Y');
    $time = date('h:i:sa');
    $paymentId = $_POST['paymentId'] ;
    $orderId = $_POST['orderId'] ;
	$signature = $_POST['signature'] ;
	$clientUId = $_POST['clientUId']  ;
	$couponId = $_POST['couponId'] ;
	$qty = $_POST['qty'] ;


    $query0 = "SELECT MAX(luckyNumber) AS maxLuckyNum FROM coupons_sold WHERE couponId=$couponId";
    $exeQ = mysqli_query($conn, $query0);
    $maxLuckyNum = mysqli_fetch_assoc($exeQ);
    $luckyNo = $maxLuckyNum['maxLuckyNum'];
    
    if ($luckyNo == null) {
       
        $luckyNo = 0;
    }

    
        
        

       $query = "UPDATE `coupons_sold` SET  `paymentStatus`='complete',`time`='$time',`boughtOn`='$date',
       `paymentId` = '$paymentId',`signature`='$signature' WHERE couponId = '$couponId' AND orderId = '$orderId' AND `clientUId`='$clientUId' ";
       $exe = mysqli_query($conn, $query);
      if($exe){

        $sel = "SELECT id FROM coupons_sold WHERE orderId = '$orderId'";
        $selExe = mysqli_query($conn,$sel);
        if (mysqli_num_rows($selExe) > 0) {

            while ($data = mysqli_fetch_assoc($selExe)) {

                $id = $data['id'];

                $luckyNo  = $luckyNo + 1;
                $updateQuery = "UPDATE coupons_sold SET luckyNumber= '$luckyNo' WHERE id='$id'";
                $exeUpdateQuery = mysqli_query($conn, $updateQuery);
                

            }
         
        }

            echo 200;
         
      } else{
         // mysqli_error($conn);
        
          echo 400;
      }

      mysqli_close($conn);

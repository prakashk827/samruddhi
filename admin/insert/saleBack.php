
<?php
session_start();
include_once ("../../db/db.php");

if(isset($_POST['clientUId'])){
     $clientUId =  $_POST['clientUId'];
    $couponId  = $_POST['couponId'];
    $date = date('d-m-Y');
    $time = date("h:i:sa");
    
    $query = "UPDATE `winner_coupons` SET `orderShipped`='yes',`shippedDate`='$date',`shippedTime`='$time' WHERE clientUId= $clientUId AND couponId = $couponId";
    $exe = mysqli_query($conn, $query);
    if($exe){
        
        echo "Done..!";
        
        
    } else {
        echo "Error while updating";
    }
    
    
    
    
    
    
}

?>
<?php
include_once ("../../db/db.php");
session_start();

$name = ($_POST['name']);
$price = ($_POST['price']);
$description = ($_POST['description']);
$startDate = ($_POST['startDate']);
$endDate = ($_POST['endDate']);
$status = "active";
$displayType = "show";
$time = date('h:i:sa');
$couponWorth = $_POST['couponWorth'];
$totalCoupons = $_POST['totalCoupons'];
$soldCoupons = 0 ;
$date = date('d-m-Y');

$sel = "SELECT * FROM coupons WHERE couponName = '$name'";
$exe = mysqli_query($conn, $sel);

if (mysqli_num_rows($exe) == 0) {
    
    $query = "INSERT INTO `coupons`(`couponName`, `description`, `startDate`, `endDate`, `couponPrice`, `status`, `displayType`,`time`,`totalCoupons`,`soldCoupons`,`couponWorth`,`date`)
    VALUES ('$name','$description','$startDate','$endDate','$price','$status','$displayType','$time','$totalCoupons','$soldCoupons','$couponWorth','$date')";
    $exe = mysqli_query($conn, $query);
    if ($exe) {
        
        $_SESSION["message"] = "Coupoun Addedd Successfully..!";
        $_SESSION["msgClr"] = "green";
        header("Location:../status.php");
    } else {
        $_SESSION["message"] = "Error while adding coupoun card..!".mysqli_errno($conn);
        $_SESSION["msgClr"] = "red";
        header("Location:../status.php");
    }
} else {
    $_SESSION["message"] = "Coupoun with same name already exits..!";
    $_SESSION["msgClr"] = "red";
    header("Location:../status.php");
}
?>
<?php
include_once("../../db/db.php");
session_start();

$name = ($_POST['name']);
$price=($_POST['price']);
$description=($_POST['description']);
$startDate=($_POST['startDate']);
$endDate=($_POST['endDate']);
$status = "active";
$displayType ="show";
$time = date('H:i:s');
$totalCoupons = $_POST['totalCoupons'];




$query="INSERT INTO `coupons`(`couponName`, `description`, `startDate`, `endDate`, `couponPrice`, `status`, `displayType`,`time`,`totalCoupons`,`leftCoupons`) VALUES ('$name','$description','$startDate','$endDate','$price','$status','$displayType','$time','$totalCoupons
','$totalCoupons')";

$exe=mysqli_query($conn,$query);
if($exe)
{

	$_SESSION["message"] = "Coupoun Card Addedd Successfully..!";
	$_SESSION["msgClr"] = "green";
	header("Location:../page-error.php");
}
else
{
	$_SESSION["message"] = "Error while adding coupoun card..!";
	$_SESSION["msgClr"] = "red";
	header("Location:../page-error.php");
}
?>
<?php
include_once("../../db/db.php");
session_start();


$name=($_POST['name']);
$price=($_POST['price']);
$des=($_POST['des']);
$sDate=($_POST['sDate']);
$eDate=($_POST['eDate']);
$status = "active";
$displayType = "show";
$date = date("d-m-Y");


$query="INSERT INTO `coupons`(`couponName`, `description`, `startDate`, `endDate`, `couponPrice`, `status`, `displayType`) VALUES ('$name','$des','$sDate','$eDate','$price','$status','$displayType')";
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
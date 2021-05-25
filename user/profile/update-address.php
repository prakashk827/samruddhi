<?php
include_once("../../db/db.php");
session_start();

$clientUId = ($_POST['clientUId']);
$houseNo=($_POST['houseNo']);
$street=($_POST['street']);
$area=($_POST['area']);
$country=($_POST['country']);
$state=($_POST['state']);
$city=($_POST['city']);
$pincode=($_POST['pincode']);
$date = date("d-m-Y");
 




$query="UPDATE `client_address` SET `date`='$date',`houseNo`='$houseNo',`street`='$street',`area`='$area',`country`='$country',`state`='$state',`city`='$city',`pincode`='$pincode',`createdOn`='$date' WHERE clientUId = $clientUId";

$exe=mysqli_query($conn,$query);
if($exe)
{

	$_SESSION["message"] = "Address updated successfully..!";
	$_SESSION["msgClr"] = "green";
	header("Location:../status.php");
}
else
{
	$_SESSION["message"] = "Error while updating address..!";
	$_SESSION["msgClr"] = "red";
	header("Location:../status.php");
}
?>
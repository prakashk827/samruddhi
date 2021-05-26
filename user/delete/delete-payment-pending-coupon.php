<?php
include_once("../../db/db.php");



$couponId = $_POST['id'];
if(isset($_POST['id'])){

$query = "DELETE FROM `coupons_sold` WHERE id = '$couponId'";
$exe=mysqli_query($conn,$query);
if($exe)
{
	
	echo "Successfully..!";
	
	
	 
}
}

?>
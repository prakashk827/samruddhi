<?php
include_once("../../db/db.php");



$id = $_POST['id'];
if(isset($_POST['id'])){

$query = "DELETE FROM `coupons_sold` WHERE id = '$id'";
$exe=mysqli_query($conn,$query);
if($exe)
{
	
	echo "<br> Successfully..!";
	
	
	 
}
}

?>